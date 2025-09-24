<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\GrantCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GrantApplicationController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'active' => true]
        ];

        $data = [
            'title' => 'Grant Applications',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.user.grant_application.index', $data);
    }

    public function create()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'url' => route('user.grant_application.index')],
            ['label' => 'Apply For Grant', 'active' => true]
        ];

        $data = [
            'title' => 'Apply For Grant',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.grant_application.form', $data);
    }

    public function individual()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'url' => route('user.grant_application.index')],
            ['label' => 'Individual Grant Application', 'active' => true]
        ];

        $grantCategories = GrantCategory::latest()->get();

        $data = [
            'title' => 'Individual Grant Application',
            'breadcrumbs' => $breadcrumbs,
            'grantCategories' => $grantCategories,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.grant_application.individual', $data);
    }

    public function company()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'url' => route('user.grant_application.index')],
            ['label' => 'Company Grant Application', 'active' => true],
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        $data = [
            'title' => 'Company Grant Application',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.grant_application.company', $data);
    }
}
