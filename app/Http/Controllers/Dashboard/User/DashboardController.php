<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['registeredUser']);
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $welcomeMessage = 'Welcome' . ' ' . Auth::user()->name;

        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => $welcomeMessage, 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $transactions = $user->transaction()->limit(3)->latest()->get();

        $bitcoin = getCryptoPriceUSD('bitcoin');
        $ethereum = getCryptoPriceUSD('ethereum');

        $btcPrice = $bitcoin;
        $ethPrice = $ethereum;

        $monthlyDeposits = $user->transaction()
            ->where('type', 'deposit')
            ->whereMonth('transaction_at', now()->month)
            ->whereYear('transaction_at', now()->year)
            ->sum('amount');

        $monthlyExpenses = $user->transaction()
            ->whereIn('type', ['transfer', 'payment'])
            ->whereMonth('transaction_at', now()->month)
            ->whereYear('transaction_at', now()->year)
            ->sum('amount');

        $totalVolume = $user->transaction()->sum('amount');

        $pendingTransactions = $user->transaction()->where('status', 'pending')->sum('amount');

        $data = [
            'title' => $welcomeMessage,
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'transactions' => $transactions,
            'btcPrice' => $btcPrice,
            'ethPrice' => $ethPrice,
            'monthlyDeposits' => $monthlyDeposits,
            'monthlyExpenses' => $monthlyExpenses,
            'totalVolume' => $totalVolume,
            'pendingTransactions' => $pendingTransactions
        ];

        return view('dashboard.user.index', $data);
    }
}
