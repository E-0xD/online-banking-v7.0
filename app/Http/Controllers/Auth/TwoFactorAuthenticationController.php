<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\TwoFactorAuthenticationCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TwoFactorAuthenticationController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = User::where('role', 'user')->where('uuid', $request->id)->firstOrFail();

            $data = [
                'title' => 'Two-Factor Authentication',
                'user' => $user
            ];

            return view('auth.two_factor_authentication', $data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('login')->with('error', config('app.messages.error'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'verification_code' => ['required', 'string'],
        ]);

        try {
            $user = User::where('role', 'user')->where('uuid', $request->id)->firstOrFail();

            if ($user->email_code_expires_at < now()) {
                return redirect()->back()->with('error', 'Verification code has expired. Please request a new one.');
            }

            if ($user->email_code != $request->verification_code) {
                return redirect()->back()->with('error', 'Invalid verification code. Please try again.');
            }

            DB::beginTransaction();

            $user->update([
                'email_verified_at' => now(),
                'email_code' => null,
                'email_code_expires_at' => null,
            ]);

            DB::commit();

            Auth::login($user);

            return redirect()->route('user.dashboard')->with('success', 'Logged in successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function send(Request $request)
    {
        try {
            $user = User::where('role', 'user')->where('uuid', $request->id)->firstOrFail();

            DB::beginTransaction();

            $user->update([
                'email_code' => getRandomNumber(6),
                'email_code_expires_at' => now()->addMinutes(10),
            ]);

            DB::commit();

            Mail::to($user->email)->queue(new TwoFactorAuthenticationCode($user));

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
