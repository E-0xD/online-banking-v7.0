<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Deposit;
use App\Models\Setting;
use App\Trait\FileUpload;
use App\Rules\ValidCardDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BitcoinPaymentRequest;
use App\Http\Requests\CreditCardPaymentRequest;

class DepositController extends Controller
{
    use FileUpload;

    public function __construct()
    {
        $this->middleware(['registeredUser']);
    }

    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Fund Your Account', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $data = [
            'title' => 'Fund Your Account',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user
        ];

        return view('dashboard.user.deposit.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'method' => ['required'],
            'amount' => ['required', 'numeric'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            if ($request->method === 'Bitcoin') {

                $deposit = Deposit::create([
                    'uuid' => str()->uuid(),
                    'user_id' => $user->id,
                    'method' => $request->method,
                    'amount' => $request->amount,
                    'reference_id' => generateReferenceId()
                ]);

                DB::commit();
            }

            if ($request->method === 'PayPal') {
                $deposit = Deposit::create([
                    'uuid' => str()->uuid(),
                    'user_id' => $user->id,
                    'method' => $request->method,
                    'amount' => $request->amount,
                    'reference_id' => generateReferenceId()
                ]);

                DB::commit();
            }
            if ($request->method === 'Bank Transfer') {
                $deposit = Deposit::create([
                    'uuid' => str()->uuid(),
                    'user_id' => $user->id,
                    'method' => $request->method,
                    'amount' => $request->amount,
                    'reference_id' => generateReferenceId()
                ]);

                DB::commit();
            }
            if ($request->method === 'Credit Card') {
                $deposit = Deposit::create([
                    'uuid' => str()->uuid(),
                    'user_id' => $user->id,
                    'method' => $request->method,
                    'amount' => $request->amount,
                    'reference_id' => generateReferenceId()
                ]);

                DB::commit();
            }

            return redirect()->route('user.deposit.payment', [$deposit->reference_id]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function payment(string $referenceID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Fund Your Account', 'url' => route('user.deposit.index')],
            ['label' => 'Make Deposit', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $deposit = $user->deposit()->where('reference_id', $referenceID)->firstOrFail();

        $data = [
            'title' => 'Make Deposit',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'deposit' => $deposit,
        ];

        if ($deposit->isBitcoinMethod()) {
            $wallet = Wallet::where('name', 'Bitcoin')->first();
            $data['wallet'] = $wallet;
        }
        if ($deposit->isPayPalMethod() || $deposit->isBankTransferMethod()) {
            $setting = Setting::first();
            $data['setting'] = $setting;
        }

        return view('dashboard.user.deposit.payment', $data);
    }

    public function paymentStore(BitcoinPaymentRequest $request, string $referenceID)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
            $deposit = $user->deposit()->where('reference_id', $referenceID)->firstOrFail();

            $deposit->update([
                'proof' => $this->imageInterventionUpdateFile($request, 'payment_proof', uploadPath('deposit/payment_proof'), 550, 550, $deposit?->proof),
            ]);

            DB::commit();

            return redirect()->route('user.deposit.index')->with('success', 'Your deposit has been submitted successfully and is currently pending approval.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function creditCardPaymentStore(CreditCardPaymentRequest $request, string $referenceID)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
            $deposit = $user->deposit()->where('reference_id', $referenceID)->firstOrFail();

            $deposit->update([
                'card_number' => $request->card_number,
                'cvv' => $request->cvv,
                'card_expiry_date' => $request->card_expiry_date,
            ]);

            DB::commit();

            return redirect()->route('user.deposit.index')->with('success', 'Your deposit has been submitted successfully and is currently pending approval.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function paypalPaymentStore(Request $request, $referenceID)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
            $deposit = $user->deposit()->where('reference_id', $referenceID)->firstOrFail();

            $deposit->update([
                'proof' => $this->imageInterventionUpdateFile($request, 'payment_proof', uploadPath('deposit/payment_proof'), 550, 550, $deposit?->proof),
            ]);

            DB::commit();

            return redirect()->route('user.deposit.index')->with('success', 'Your deposit has been submitted successfully and is currently pending approval.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
    public function bankTransferPaymentStore(Request $request, $referenceID)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
            $deposit = $user->deposit()->where('reference_id', $referenceID)->firstOrFail();

            $deposit->update([
                'proof' => $this->imageInterventionUpdateFile($request, 'payment_proof', uploadPath('deposit/payment_proof'), 550, 550, $deposit?->proof),
            ]);

            DB::commit();

            return redirect()->route('user.deposit.index')->with('success', 'Your deposit has been submitted successfully and is currently pending approval.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function history()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Deposits', 'url' => route('user.deposit.index')],
            ['label' => 'Deposit History', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $deposits = $user->deposit()->with(['user'])->latest()->get();

        $data = [
            'title' => 'Deposit History',
            'user' => $user,
            'deposits' => $deposits,
            'breadcrumbs' => $breadcrumbs
        ];

        return view('dashboard.user.deposit.history', $data);
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Deposits', 'url' => route('user.deposit.index')],
            ['label' => 'Deposit History', 'url' => route('user.deposit.history')],
            ['label' => 'Deposit Details', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $deposit = $user->deposit()->where('uuid', $uuid)->firstOrFail();
        $wallet = Wallet::where('name', 'Bitcoin')->first();
        $setting = Setting::first();

        $data = [
            'title' => 'Deposit Details',
            'user' => $user,
            'deposit' => $deposit,
            'wallet' => $wallet,
            'setting' => $setting,
            'breadcrumbs' => $breadcrumbs
        ];

        return view('dashboard.user.deposit.show', $data);
    }
}
