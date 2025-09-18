<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create() {}

    public function store(Request $request) {}

    public function destroy(Request $request)
    {
        // 1️⃣ Logs out the authenticated user
        Auth::logout();

        // 2️⃣ Invalidates the current session to prevent reuse (e.g., session fixation attacks)
        $request->session()->invalidate();

        // 3️⃣ Regenerates the CSRF token to avoid token reuse
        $request->session()->regenerateToken();

        // 4️⃣ Redirects the user to the login page
        return redirect()->route('login');
    }
}
