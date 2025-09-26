<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use App\Enum\LoanStatus;
use Illuminate\Http\Request;
use App\Enum\LoanRepaymentStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoanControllerStoreRequest;
use App\Models\LoanRepayment;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['registeredUser']);
    }

    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Loan Services', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $data = [
            'title' => 'Loan Services',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user
        ];

        return view('dashboard.user.loan.index', $data);
    }

    public function create()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Loan Services', 'url' => route('user.loan.index')],
            ['label' => 'Loan Application', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $latestLoan = $user->loan()->latest()->first();

        if ($latestLoan) {
            if ($latestLoan->isPending()) {
                return redirect()->route('user.loan.index')->with('error', 'You have a pending loan application, please wait for approval.');
            }
        }

        $data = [
            'title' => 'Loan Application',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user
        ];

        return view('dashboard.user.loan.form', $data);
    }

    public function store(UserLoanControllerStoreRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $data = [
                'uuid' => str()->uuid(),
                'amount' => $request->amount,
                'duration' => $request->duration,
                'facility' => $request->facility,
                'purpose' => $request->purpose,
                'monthly_income' => $request->monthly_income,
            ];

            $user->loan()->create($data);

            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'Loan Application',
                'description' => 'Your loan application has been submitted, please wait for approval.',
            ]);

            DB::commit();

            return redirect()->route('user.loan.index')->with('success', 'Loan application submitted successfully, please wait for approval.');
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
            ['label' => 'Loan Services', 'url' => route('user.loan.index')],
            ['label' => 'Loan History', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $loans = $user->loan()->latest()->get();

        $data = [
            'title' => 'Loan History',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'loans' => $loans
        ];

        return view('dashboard.user.loan.history', $data);
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Loan Services', 'url' => route('user.loan.index')],
            ['label' => 'Loan History', 'url' => route('user.loan.history')],
            ['label' => 'Loan Details', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $loan = $user->loan()->where('uuid', $uuid)->firstOrFail();

        $latestLoanRepayment = $loan->loanRepayment()->latest()->first();

        $data = [
            'title' => 'Loan Details',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'loan' => $loan,
            'latestLoanRepayment' => $latestLoanRepayment
        ];

        return view('dashboard.user.loan.show', $data);
    }

    public function repay(Request $request, string $uuid)
    {
        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $loan = $user->loan()->where('uuid', $uuid)->firstOrFail();
        $latestLoanRepayment = $loan->loanRepayment()->latest()->first();


        if (!$loan->isDisbursed()) {
            return redirect()->back()->with('error', 'Loan not disbursed, Only disbursed loans can be repaid.');
        }

        if ($loan->loanRepayment()->count() > 0 && $latestLoanRepayment->isPaid()) {
            return redirect()->back()->with('error', 'Loan already repaid.');
        }

        if ($user->account_balance < $loan->approved_amount) {
            return redirect()->back()->with('error', 'Insufficient balance.');
        }

        try {
            DB::beginTransaction();

            $latestLoanRepayment->update([
                'amount' => $loan->approved_amount,
                'repaid_at' => now(),
                'status' => LoanRepaymentStatus::Paid->value
            ]);

            $user->account_balance = $user->account_balance - $loan->approved_amount;
            $user->save();

            // Transaction record here

            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'Loan Repaid',
                'description' => 'Your loan has been repaid successfully. You can now view your loan details in your account dashboard.',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Loan repaid successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
