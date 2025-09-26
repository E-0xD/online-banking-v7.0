<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\LoanStatus;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class UserLoanController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Loans Applications', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $loans = $user->loan()->latest()->get();

        $data = [
            'title' => 'Loans Applications',
            'user' => $user,
            'loans' => $loans,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.user.loan.index', $data);
    }

    public function show(string $uuid, string $loanUUID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Loans Applications', 'url' => route('admin.user.loan.index', $uuid)],
            ['label' => 'Loan Application Details', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $loan = $user->loan()->where('uuid', $loanUUID)->firstOrFail();
        $setting = Setting::first();

        $data = [
            'title' => 'Loan Application Details',
            'user' => $user,
            'loan' => $loan,
            'breadcrumbs' => $breadcrumbs,
            'setting' => $setting,
        ];

        return view('dashboard.admin.user.loan.show', $data);
    }

    public function approve(Request $request, $uuid, $loanUUID)
    {
        $request->validate([
            'approved_amount' => ['required', 'numeric'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $loan = $user->loan()->where('uuid', $loanUUID)->firstOrFail();
            $setting = Setting::first();

            $principal = $request->approved_amount;
            $rate = $setting->loan_interest_rate; // annual %
            $months = $loan->duration;

            // flat interest calculation
            $interest = ($principal * $rate * $months) / (12 * 100);
            $totalPayable = $principal + $interest;
            $monthlyInstallment = $totalPayable / $months;

            $loan->update([
                'approved_amount'    => $principal,
                'interest_rate'      => $rate,
                'total_payable'      => $totalPayable,
                'status'             => LoanStatus::Approved->value,
            ]);

            // store installments in loan_repayments table
            for ($i = 1; $i <= $months; $i++) {
                $loan->loanRepayment()->create([
                    'due_date' => now()->addMonths($i),
                    'amount'   => $monthlyInstallment,
                    'status'   => 'pending',
                ]);
            }

            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'Loan Approved',
                'description' => 'Your loan application has been approved successfully. You can now view your payment schedule and loan details in your account dashboard.',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Loan approved successfully with repayment schedule.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function disburse(Request $request, $uuid, $loanUUID)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $loan = $user->loan()->where('uuid', $loanUUID)->firstOrFail();

        if ($loan->status->value != LoanStatus::Approved->value) {
            return redirect()->back()->with('error', 'Loan not approved, Only approved loans can be disbursed.');
        }

        try {
            DB::beginTransaction();

            $user->account_balance = $user->account_balance + $loan->approved_amount;
            $user->save();

            // Record transaction here

            $loan->update([
                'status' => LoanStatus::Disbursed->value,
                'disbursed_at' => now(),
            ]);

            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'Loan Disbursed',
                'description' => 'Your loan has been disbursed successfully. You can now view your loan details in your account dashboard.',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Loan disbursed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function reject(Request $request, $uuid, $loanUUID)
    {
        $request->validate([
            'remarks' => 'required|string|max:500',
        ]);

        $user = User::where('uuid', $uuid)->firstOrFail();
        $loan = $user->loan()->where('uuid', $loanUUID)->firstOrFail();

        if ($loan->status->value != LoanStatus::Pending->value) {
            return redirect()->back()->with('error', 'Loan not pending, Only pending loans can be rejected.');
        }

        try {
            DB::beginTransaction();

            $loan->update([
                'status' => LoanStatus::Rejected->value,
                'remarks' => $request->remarks,
            ]);

            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'Loan Rejected',
                'description' => 'Your loan application has been rejected. You can now view your loan details in your account dashboard.',
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Loan rejected.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function delete(Request $request, $uuid, $loanUUID)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $loan = $user->loan()->where('uuid', $loanUUID)->firstOrFail();

        if ($loan->status->value != LoanStatus::Pending->value) {
            return redirect()->back()->with('error', 'Loan not pending, Only pending loans can be deleted.');
        }

        try {
            DB::beginTransaction();

            $loan->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Loan deleted.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
