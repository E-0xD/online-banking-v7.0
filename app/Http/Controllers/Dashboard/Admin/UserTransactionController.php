<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Enum\TransactionType;
use App\Enum\TransactionStatus;
use App\Enum\TransactionDirection;
use Illuminate\Support\Facades\DB;
use App\Mail\TransactionSuccessful;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserTransactionControllerStoreRequest;

class UserTransactionController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Transactions', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $transactions = $user->transaction()->latest()->get();

        $data = [
            'title' => 'Transactions',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'transactions' => $transactions,
            'transactionTypes' => TransactionType::cases(),
            'transactionDirections' => TransactionDirection::cases(),
        ];

        return view('dashboard.admin.user.transaction.index', $data);
    }

    public function show(string $uuid, string $transactionUUID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Transactions', 'url' => route('admin.user.transaction.index', $uuid)],
            ['label' => 'Transaction', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $transaction = $user->transaction()->where('uuid', $transactionUUID)->firstOrFail();

        $data = [
            'title' => 'Transaction',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'transaction' => $transaction,
        ];

        return view('dashboard.admin.user.transaction.show', $data);
    }

    public function store(UserTransactionControllerStoreRequest $request, $uuid)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->first();

            if ($validated['direction'] == 'credit') {
                if ($user->exceedsAccountCapacity($validated['amount'])) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'This account cannot hold more than ' . currency($user->currency) . number_format($user->account_limit));
                }
            }

            switch ($validated['direction']) {
                case 'debit':
                    if ($user->account_balance < $validated['amount']) {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Insufficient balance!');
                    }

                    $user->account_balance = $user->account_balance - $validated['amount'];
                    $user->save();
                    break;
                case 'credit':
                    $user->account_balance = $user->account_balance + $validated['amount'];
                    $user->save();
                    break;
            }

            $transaction = Transaction::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'type' => $validated['type'],
                'direction' => $validated['direction'],
                'description' => $validated['description']
                    ?? ucfirst($validated['direction']) . " of " . currency($user->currency) . formatAmount($validated['amount']) . " via " . ucfirst($validated['type']),
                'amount' => $validated['amount'],
                'current_balance' => $user->account_balance,
                'transaction_at' => $validated['transaction_at'],
                'reference_id' => generateReferenceId(),
                'status' => TransactionStatus::Completed->value
            ]);

            $message = match ($validated['direction']) {
                'credit' => "Your account has been credited with " . currency($user->currency) . formatAmount($validated['amount']) .
                    " for {$validated['type']} on " . formatDateTime($validated['transaction_at']) .
                    ". Your new balance is " . currency($user->currency) . formatAmount($user->account_balance) . ".",

                'debit' => "Your account has been debited with " . currency($user->currency) . formatAmount($validated['amount']) .
                    " for {$validated['type']} on " . formatDateTime($validated['transaction_at']) .
                    ". Your new balance is " . currency($user->currency) . formatAmount($user->account_balance) . ".",
            };


            Notification::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'title' => $validated['type'],
                'description' => $message,
            ]);

            if ($validated['notification'] == 'email') {
                Mail::to($user->email)->queue(new TransactionSuccessful($user, $transaction));
            }

            DB::commit();

            return redirect()->route('admin.user.transaction.index', [$user->uuid])->with('success', 'Transaction created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function delete(Request $request, $uuid, $transactionUUID)
    {
        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $transaction = $user->transaction()->where('uuid', $transactionUUID)->firstOrFail();

            $transaction->delete();

            DB::commit();

            return redirect()->route('admin.user.transaction.index', [$user->uuid])->with('success', 'Transaction deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
