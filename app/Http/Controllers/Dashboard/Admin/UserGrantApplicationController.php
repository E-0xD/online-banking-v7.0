<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\GrantApplicationStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $grantApplication = $user->grantApplication()->where('uuid', $grantApplicationUUID)->firstOrFail();

            $grantApplication->update([
                'status' => $request->status
            ]);

            if ($request->status === GrantApplicationStatus::Approved->value) {
                $user->account_balance = $user->account_balance + $grantApplication->amount;
                $user->save();

                $message = "Congratulations! Your grant application has been approved. An amount of" . currency($user->currency) . formatAmount($grantApplication->amount) . " has been credited to your account. Your new balance is " . currency($user->currency) . formatAmount($user->account_balance) . ". Please log in to your account to review the update.";

                $user->notification()->create([
                    'uuid' => str()->uuid(),
                    'title' => 'Grant Application Approved',
                    'description' => $message,
                ]);
            }

            DB::commit();

            return redirect()->route('admin.user.grant_application.show', [$uuid, $grantApplicationUUID])->with('success', 'Grant Application updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
}
