<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use App\Models\Transfer;
use App\Enum\TransferType;
use App\Models\Transaction;
use App\Enum\TransferStatus;
use App\Models\Notification;
use App\Models\TransferCode;
use Illuminate\Http\Request;
use App\Enum\TransactionType;
use App\Mail\TransferComplete;
use App\Enum\TransactionStatus;
use App\Enum\TransactionDirection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreLocalTransferRequest;

class TransferController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Transfers', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $transfers = $user->transfer()->latest()->get();

        $data = [
            'user' => $user,
            'title' => 'Transfers',
            'breadcrumbs' => $breadcrumbs,
            'transfers' => $transfers
        ];

        return view('dashboard.user.transfer.index', $data);
    }

    public function local()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Transfers', 'url' => route('user.transfer.index')],
            ['label' => 'Local Transfer', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $data = [
            'user' => $user,
            'title' => 'Local Transfer',
            'breadcrumbs' => $breadcrumbs
        ];

        return view('dashboard.user.transfer.local', $data);
    }

    public function localStore(StoreLocalTransferRequest $request)
    {
        $request->validated();

        if (!password_verify($request->transaction_pin, Auth::user()->transaction_pin)) {
            return redirect()->back()->withErrors(['transaction_pin' => 'Transaction PIN is incorrect']);
        }

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $transfer = Transfer::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'amount' => $request->amount,
                'currency' => $user->currency,
                'sender_account_number' => $user->account_number,
                'sender_bank' => config('app.name'),
                'recipient_name' => $request->beneficiary_name,
                'recipient_account_number' => $request->beneficiary_account_number,
                'recipient_bank' => $request->bank_name,
                'recipient_account_type' => $request->account_type,
                'recipient_swift_code' => $request->swift_code,
                'recipient_routing_number' => $request->routing_number,
                'description' => $request->description ?? "Local transfer of " . currency($user->currency) . formatAmount($request->amount),
                'transfer_type' => TransferType::Local->value,
                'reference_id' => generateReferenceId()
            ]);

            $transferCode = new TransferCode();
            $transferCode->createTransferCode($transfer->reference_id, $user);

            DB::commit();

            return redirect()->route('user.transfer.preview', $transfer->uuid);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function international()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Transfers', 'url' => route('user.transfer.index')],
            ['label' => 'International Transfer', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $data = [
            'user' => $user,
            'title' => 'International Transfer',
            'breadcrumbs' => $breadcrumbs
        ];

        return view('dashboard.user.transfer.international', $data);
    }

    public function internationalStore(StoreLocalTransferRequest $request)
    {
        $request->validated();

        if (!password_verify($request->transaction_pin, Auth::user()->transaction_pin)) {
            return redirect()->back()->withErrors(['transaction_pin' => 'Transaction PIN is incorrect']);
        }

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $transfer = Transfer::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'amount' => $request->amount,
                'currency' => $user->currency,
                'sender_account_number' => $user->account_number,
                'sender_bank' => config('app.name'),
                'recipient_name' => $request->beneficiary_name,
                'recipient_account_number' => $request->beneficiary_account_number,
                'recipient_bank' => $request->bank_name,
                'recipient_bank_address' => $request->bank_address,
                'recipient_account_type' => $request->account_type,
                'recipient_country' => $request->country,
                'recipient_swift_code' => $request->swift_code,
                'recipient_iban_code' => $request->iban_number,
                'description' => $request->description ?? "International transfer of " . currency($user->currency) . formatAmount($request->amount),
                'transfer_type' => TransferType::International->value,
                'reference_id' => generateReferenceId()
            ]);

            $transferCode = new TransferCode();
            $transferCode->createTransferCode($transfer->reference_id, $user);

            DB::commit();

            return redirect()->route('user.transfer.preview', $transfer->uuid);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Transfers', 'url' => route('user.transfer.index')],
            ['label' => 'Transfer', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $transfer = $user->transfer()->where('uuid', $uuid)->firstOrFail();

        $data = [
            'user' => $user,
            'title' => 'Transfer',
            'breadcrumbs' => $breadcrumbs,
            'transfer' => $transfer
        ];

        return view('dashboard.user.transfer.show', $data);
    }
    public function preview(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Transfers', 'url' => route('user.transfer.index')],
            ['label' => 'Transfer Preview', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $transfer = $user->transfer()->where('uuid', $uuid)->firstOrFail();

        $transferNeedVerificationCode = TransferCode::where('transfer_reference_id', $transfer->reference_id)->where('user_id', $user->id)->first();

        $orderNo = 1;

        $data = [
            'user' => $user,
            'title' => 'Transfer Preview',
            'breadcrumbs' => $breadcrumbs,
            'transfer' => $transfer,
            'transferNeedVerificationCode' => $transferNeedVerificationCode,
            'orderNo' => $orderNo
        ];

        return view('dashboard.user.transfer.preview', $data);
    }

    public function complete(string $uuid)
    {
        try {
            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $transfer = $user->transfer()->where('uuid', $uuid)->firstOrFail();

            $transfer->status = TransferStatus::Completed->value;
            $transfer->save();

            $user->account_balance -= $transfer->amount;
            $user->save();

            // Create transaction
            Transaction::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'type' => TransactionType::Transfer->value,
                'direction' => TransactionDirection::Debit->value,
                'description' => $transfer->description,
                'amount' => $transfer->amount,
                'current_balance' => $user->account_balance,
                'transaction_at' => now(),
                'reference_id' => $transfer->reference_id,
                'status' => TransactionStatus::Completed->value,
            ]);

            // Create notification
            $message = "Your transfer of " . currency($transfer->user->currency) . formatAmount($transfer->amount) . " to " . $transfer->beneficiary_name . " was successful.";

            Notification::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'title' => "Transfer Completed",
                'description' => $message,
            ]);

            Mail::to($user->email)->queue(new TransferComplete($user, $transfer));

            DB::commit();

            return redirect()->route('user.transfer.success', $transfer->uuid);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function fail(string $uuid)
    {
        try {
            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $transfer = $user->transfer()->where('uuid', $uuid)->firstOrFail();

            $transfer->status = TransferStatus::Failed->value;
            $transfer->save();

            DB::commit();

            return redirect()->route('user.transfer.show', $transfer->uuid)->with('error', config('app.messages.error'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function success(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Transfers', 'url' => route('user.transfer.index')],
            ['label' => 'Transfer Successful', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $transfer = $user->transfer()->where('uuid', $uuid)->firstOrFail();

        $data = [
            'user' => $user,
            'title' => 'Transfer Successful',
            'breadcrumbs' => $breadcrumbs,
            'transfer' => $transfer
        ];

        return view('dashboard.user.transfer.success', $data);
    }

    public function cancel(string $uuid)
    {
        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $transfer = $user->transfer()->where('uuid', $uuid)->firstOrFail();

        try {
            DB::beginTransaction();

            $transfer->update([
                'status' => TransferStatus::Cancelled->value
            ]);

            DB::commit();

            return redirect()->route('user.transfer.show', $transfer->uuid);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function verify(string $uuid, $orderNo)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Transfers', 'url' => route('user.transfer.index')],
            ['label' => 'Transfer Verification', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $transfer = $user->transfer()->where('uuid', $uuid)->firstOrFail();

        $transferCode = new TransferCode();

        $data = [
            'user' => $user,
            'title' => 'Transfer Verification',
            'breadcrumbs' => $breadcrumbs,
            'transfer' => $transfer,
            'transferCodes' => $transferCode->getTransferVerificationData($transfer->reference_id),
            'referenceId' => $transfer->reference_id,
            'orderNo' => $orderNo
        ];

        return view('dashboard.user.transfer.verify', $data);
    }

    public function verifyStore(Request $request, string $uuid, $orderNo)
    {
        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $transfer = $user->transfer()->where('uuid', $uuid)->firstOrFail();

        $transferCode = TransferCode::where('code', $request->code)->where('order_no', $orderNo)->where('transfer_reference_id', $transfer->reference_id)->first();

        $transferCodeCounts = TransferCode::where('transfer_reference_id', $transfer->reference_id)->where('user_id', $user->id)->count();

        try {
            if ($transferCode) {
                if ($orderNo >= $transferCodeCounts) {
                    return redirect()->route('user.transfer.complete', $transfer->uuid);
                } else {
                    $orderNo += 1;
                    return redirect()->route('user.transfer.verify', [$transfer->uuid, $orderNo]);
                }
            } else {
                return redirect()->back()->withErrors(['code' => 'The verification code you entered is invalid. Please try again.']);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
