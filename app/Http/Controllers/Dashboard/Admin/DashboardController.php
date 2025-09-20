<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
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
            ['label' => 'Welcome Admin', 'url' => route('admin.dashboard'), 'active' => true]
        ];

        $data = [
            'title' => 'Welcome Admin',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.index', $data);
    }
}
