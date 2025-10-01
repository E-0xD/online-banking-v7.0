<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Transactions', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $transactions = $user->transaction()->latest()->get();

        $data = [
            'title' => 'Transactions',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'transactions' => $transactions,
        ];

        return view('dashboard.user.transaction.index', $data);
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Transactions', 'url' => route('user.transaction.index')],
            ['label' => 'Transaction', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $transaction = $user->transaction()->where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Transaction',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'transaction' => $transaction,
        ];

        return view('dashboard.user.transaction.show', $data);
    }
}
