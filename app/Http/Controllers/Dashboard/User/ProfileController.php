<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Profile', 'url' => route('user.profile.index'), 'active' => true]
        ];

        $data = [
            'title' => 'Profile',
            'breadcrumbs' => $breadcrumbs,
            'user' => Auth::user()
        ];

        return view('dashboard.user.profile.index', $data);
    }
}
