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
        $transactions = $user->transaction()->latest()->get();

        $data = [
            'title' => $welcomeMessage,
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'transactions' => $transactions
        ];

        return view('dashboard.user.index', $data);
    }
}
