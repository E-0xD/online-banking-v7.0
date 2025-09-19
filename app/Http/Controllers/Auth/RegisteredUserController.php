<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $data = ['title' => 'Create Account'];

        return view('auth.register', $data);
    }

    public function store(Request $request) {}
}
