<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
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

        $data = [
            'title' => $welcomeMessage,
            'breadcrumbs' => $breadcrumbs
        ];

        return view('dashboard.user.index', $data);
    }
}
