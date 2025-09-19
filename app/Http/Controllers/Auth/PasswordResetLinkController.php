<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        $data = ['title' => 'Forgot Password'];

        return view('auth.forgot_password', $data);
    }

    public function store(Request $request) {}
}
