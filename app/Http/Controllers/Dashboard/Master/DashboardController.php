<?php

namespace App\Http\Controllers\Dashboard\Master;

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
            ['label' => 'Welcome Master Admin', 'url' => route('master.dashboard'), 'active' => true]
        ];

        $data = [
            'title' => 'Welcome Master Admin',
            'breadcrumbs' => $breadcrumbs,
            'admins' => User::where('role', 'admin')->latest()->get()
        ];

        return view('dashboard.master.index', $data);
    }
}
