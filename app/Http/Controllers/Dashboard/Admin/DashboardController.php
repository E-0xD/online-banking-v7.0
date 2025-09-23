<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Welcome Admin', 'active' => true]
        ];

        $users = User::where('role', 'user')->latest()->get();

        $data = [
            'title' => 'Welcome Admin',
            'breadcrumbs' => $breadcrumbs,
            'users' => $users
        ];

        return view('dashboard.admin.index', $data);
    }
}
