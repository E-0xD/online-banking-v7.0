<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TwoFactorAuthenticationCode;
use App\Enum\TwoFactorAuthenticationStatus;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Requests\AuthenticatedSessionControllerStoreRequest;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        $data = ['title' => 'Account Login'];

        return view('auth.login', $data);
    }

    public function store(AuthenticatedSessionControllerStoreRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // Build a unique key for this user + IP combo
        $key = Str::lower($request->input('email')) . '|' . $request->ip();

        // Check for too many attempts
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()
                ->withErrors(['email' => "Too many login attempts. Please try again in {$seconds} seconds."])
                ->onlyInput('email');
        }

        try {
            if (Auth::attempt($credentials, $remember)) {
                // Successful login → Clear attempts
                RateLimiter::clear($key);

                $user = Auth::user();
                if ($user->role === 'user') {
                    if ($user->status->value === 0) {
                        Auth::logout();
                        return back()->withErrors([
                            'email' => 'Your account is currently inactive and cannot be used to log in. Please contact an administrator to reactivate your account.',
                        ])->onlyInput('email');
                    }

                    if ($user->two_factor_authentication->value === TwoFactorAuthenticationStatus::ENABLED->value) {
                        User::where('id', $user->id)->update([
                            'email_code' => getRandomNumber(6),
                            'email_code_expires_at' => now()->addMinutes(10),
                        ]);

                        Mail::to($user->email)->queue(new TwoFactorAuthenticationCode($user));

                        Auth::logout();

                        return redirect()->route('two_factor_authentication', ['id' => $user->uuid]);
                    }

                    request()->session()->regenerate();

                    return redirect()->route('user.dashboard')->with('success', 'Logged in successfully.');
                }

                if ($user->role === 'admin') {
                    if ($user->status->value === 0) {
                        Auth::logout();
                        return redirect()->back()->with('error', 'Your account is currently inactive and cannot be used to log in. Please contact an administrator to reactivate your account.');
                    }

                    request()->session()->regenerate();

                    return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully.');
                }

                if ($user->role === 'master') {
                    request()->session()->regenerate();

                    return redirect()->route('master.dashboard')->with('success', 'Logged in successfully.');
                }
            }

            // Failed login → Record attempt and throttle for 120 seconds
            RateLimiter::hit($key, 120);

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function destroy(Request $request)
    {
        // 1️⃣ Logs out the authenticated user
        Auth::logout();

        // 2️⃣ Invalidates the current session to prevent reuse (e.g., session fixation attacks)
        $request->session()->invalidate();

        // 3️⃣ Regenerates the CSRF token to avoid token reuse
        $request->session()->regenerateToken();

        // 4️⃣ Redirects the user to the login page
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
