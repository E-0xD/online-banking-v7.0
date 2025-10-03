<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Setting;
use App\Trait\FileUpload;
use App\Enum\DepositStatus;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Enum\TransactionType;
use App\Mail\DepositApproved;
use App\Enum\TransactionStatus;
use App\Enum\TransactionDirection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserDepositController extends Controller
{
    use FileUpload;
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Deposits', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $deposits = $user->deposit()->with(['user'])->latest()->get();

        $data = [
            'title' => 'Deposits',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'deposits' => $deposits
        ];

        return view('dashboard.admin.user.deposit.index', $data);
    }

    public function show($uuid, $depositUUID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Deposits', 'url' => route('admin.user.deposit.index', $uuid)],
            ['label' => 'Deposit Details', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $deposit = $user->deposit()->where('uuid', $depositUUID)->firstOrFail();
        $wallet = Wallet::where('name', 'Bitcoin')->first();
        $setting = Setting::first();

        $data = [
            'title' => 'Deposit Details',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'deposit' => $deposit,
            'wallet' => $wallet,
            'setting' => $setting
        ];

        return view('dashboard.admin.user.deposit.show', $data);
    }

    public function update(Request $request, $uuid, $depositUUID)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();

            $deposit = $user->deposit()->where('uuid', $depositUUID)->firstOrFail();

            if ($request->status === DepositStatus::Approved->value) {

                if ($user->exceedsAccountCapacity($deposit->amount)) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'This account cannot hold more than ' . currency($user->currency) . number_format($user->account_limit));
                }

                $deposit->update([
                    'status' => $request->status,
                ]);

                // Update user account balance
                $user->update([
                    'account_balance' => $user->account_balance + $deposit->amount,
                ]);

                // Save transaction
                $transaction = Transaction::create([
                    'uuid' => str()->uuid(),
                    'user_id' => $user->id,
                    'type' => TransactionType::Deposit->value,
                    'direction' => TransactionDirection::Credit->value,
                    'description' => ucfirst($deposit->method) . ' deposit, Ref: ' . $deposit->reference_id,
                    'amount' => $deposit->amount,
                    'current_balance' => $user->account_balance,
                    'transaction_at' => now(),
                    'reference_id' => $deposit->reference_id,
                    'status' => TransactionStatus::Completed->value,
                ]);

                // Save notification
                $message = 'Your' . ' ' . ucfirst($deposit->method) . ' ' .  'deposit of' . ' ' . currency($deposit->user->currency) . $deposit->amount . ' ' . 'is confirmed and added to your balance.';

                Notification::create([
                    'uuid' => str()->uuid(),
                    'user_id' => $user->id,
                    'title' => 'Deposit Approved',
                    'description' => $message
                ]);

                // Send mail
                Mail::to($user->email)->queue(new DepositApproved($user, $transaction));

                DB::commit();
            }

            if ($request->status === DepositStatus::Rejected->value) {
                $deposit->update([
                    'status' => $request->status,
                ]);

                DB::commit();
            }


            return redirect()->route('admin.user.deposit.show', [$uuid, $depositUUID])->with('success', 'Deposit has been updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function delete($uuid, $depositUUID)
    {
        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $deposit = $user->deposit()->where('uuid', $depositUUID)->firstOrFail();

            $toDelete = null;
            if ($deposit->proof) {
                $toDelete = $deposit->proof;
            }

            $deposit->delete();

            $this->deleteFile($toDelete);

            DB::commit();
            return redirect()->route('admin.user.deposit.index', $uuid)->with('success', 'Deposit has been deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
