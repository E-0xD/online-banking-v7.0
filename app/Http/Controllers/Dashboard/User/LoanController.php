<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoanControllerStoreRequest;

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

        $data = [
            'title' => 'Loan Services',
            'breadcrumbs' => $breadcrumbs,
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
}
