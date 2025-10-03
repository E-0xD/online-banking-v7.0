<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Enum\TransactionType;
use App\Enum\TransactionStatus;
use App\Enum\TransactionDirection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Enum\GrantApplicationStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\GrantApplicationApproved;

class UserGrantApplicationController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Grant Applications', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $grantApplications = $user->grantApplication()->latest()->get();

        $data = [
            'title' => 'Grant Applications',
            'user' => $user,
            'grantApplications' => $grantApplications,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.user.grant_application.index', $data);
    }

    public function show(string $uuid, string $grantApplicationUUID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Grant Applications', 'url' => route('admin.user.grant_application.index', $uuid)],
            ['label' => 'Grant Application Details', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $grantApplication = $user->grantApplication()->where('uuid', $grantApplicationUUID)->firstOrFail();

        $data = [
            'title' => 'Grant Application Details',
            'user' => $user,
            'grantApplication' => $grantApplication,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.user.grant_application.show', $data);
    }

    public function update(Request $request, string $uuid, string $grantApplicationUUID)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
            'review_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();

            $grantApplication = $user->grantApplication()->where('uuid', $grantApplicationUUID)->firstOrFail();

            $grantApplication->update([
                'status' => $request->status,
                'review_notes' => $request->review_notes
            ]);

            if ($request->status === GrantApplicationStatus::Approved->value) {

                if ($user->exceedsAccountCapacity($grantApplication->amount)) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'This account cannot hold more than ' . currency($user->currency) . number_format($user->account_limit));
                }

                $user->account_balance = $user->account_balance + $grantApplication->amount;
                $user->save();

                // Save transaction
                Transaction::create([
                    'uuid' => str()->uuid(),
                    'user_id' => $user->id,
                    'type' => TransactionType::Deposit->value,
                    'direction' => TransactionDirection::Credit->value,
                    'description' => 'Grant Application Deposit, Ref: ' . $grantApplication->reference_id,
                    'amount' => $grantApplication->amount,
                    'current_balance' => $user->account_balance,
                    'transaction_at' => now(),
                    'reference_id' => $grantApplication->reference_id,
                    'status' => TransactionStatus::Completed->value,
                ]);

                $message = "Congratulations! Your grant application has been approved. An amount of " . currency($user->currency) . formatAmount($grantApplication->amount) . " has been credited to your account. Your new balance is " . currency($user->currency) . formatAmount($user->account_balance) . ". Please log in to your account to review the update.";

                $user->notification()->create([
                    'uuid' => str()->uuid(),
                    'title' => 'Grant Application Approved',
                    'description' => $message,
                ]);

                Mail::to($user->email)->queue(new GrantApplicationApproved($user));
            }

            $message = "Your grant application has been " . ucfirst($request->status) . ". Please log in to your account to review the update.";

            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'Grant Application ' . ucfirst($request->status),
                'description' => $message,
            ]);

            DB::commit();

            return redirect()->route('admin.user.grant_application.show', [$uuid, $grantApplicationUUID])->with('success', 'Grant Application updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function delete(string $uuid, string $grantApplicationUUID)
    {
        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $grantApplication = $user->grantApplication()->where('uuid', $grantApplicationUUID)->firstOrFail();

            $grantApplication->delete();

            DB::commit();

            return redirect()->route('admin.user.grant_application.index', $uuid)->with('success', 'Grant Application deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
