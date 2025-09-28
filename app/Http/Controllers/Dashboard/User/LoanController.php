<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use App\Mail\LoanRepaid;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Enum\TransactionType;
use App\Models\LoanRepayment;
use App\Enum\TransactionStatus;
use App\Enum\LoanRepaymentStatus;
use App\Enum\TransactionDirection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserLoanControllerStoreRequest;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'registeredUser',
            'accountDormant',
            'accountRestricted',
            'accountFrozen',
            'accountPendingVerification'
        ]);
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
                'reference_id' => generateReferenceId()
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

        if ($user->account_balance < $loan->total_payable) {
            return redirect()->back()->with('error', 'Insufficient balance.');
        }

        try {
            DB::beginTransaction();

            $latestLoanRepayment->update([
                'repaid_at' => now(),
                'status' => LoanRepaymentStatus::Paid->value
            ]);

            // Update balance
            $user->account_balance = $user->account_balance - $loan->total_payable;
            $user->save();

            // Create transaction
            Transaction::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'type' => TransactionType::Payment->value,
                'direction' => TransactionDirection::Debit->value,
                'description' => "Loan repayment for Ref: {$loan->reference_id}",
                'amount' => $loan->total_payable,
                'current_balance' => $user->account_balance,
                'transaction_at' => now(),
                'reference_id' => $loan->reference_id,
                'status' => TransactionStatus::Completed->value,
            ]);

            // Create notification
            $message = "Loan of " . currency($user->currency) . formatAmount($loan->total_payable) . " (Ref: {$loan->reference_id}) fully repaid.";

            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'Loan Repaid',
                'description' => $message,
            ]);

            // Send mail
            Mail::to($user->email)->queue(new LoanRepaid($user, $loan));

            DB::commit();

            return redirect()->back()->with('success', 'Loan repaid successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
