<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Trait\FileUpload;
use Illuminate\Support\Facades\Auth;

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

                return redirect()->route('user.deposit.payment', [$deposit->reference_id]);
            }

            if ($request->method === 'PayPal') {
            }
            if ($request->method === 'Bank Transfer') {
            }
            if ($request->method === 'Credit Card') {
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }




        return redirect()->route('user.deposit.index');
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

        if ($deposit->method === 'Bitcoin') {
            $wallet = Wallet::where('name', 'Bitcoin')->first();
        }

        $data = [
            'title' => 'Make Deposit',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'deposit' => $deposit,
            'wallet' => $wallet
        ];

        return view('dashboard.user.deposit.payment', $data);
    }

    public function paymentStore(Request $request, string $referenceID)
    {
        $request->validate([
            'payment_proof' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
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
}
