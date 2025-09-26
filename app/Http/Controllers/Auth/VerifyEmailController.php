<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\EmailVerificationCode;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\VerifyEmailControllerStoreRequest;

class VerifyEmailController extends Controller
{
    public function create()
    {
        $data = ['title' => 'Verify Email'];

        return view('auth.verify_email', $data);
    }

    public function store(VerifyEmailControllerStoreRequest $request)
    {
        $request->validated();

        try {

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

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
            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            DB::beginTransaction();

            $user->update([
                'email_code' => getRandomNumber(6),
                'email_code_expires_at' => now()->addMinutes(60),
            ]);

            DB::commit();

            Mail::to($user->email)->queue(new EmailVerificationCode($user, 'Email Verification Code'));

            return redirect()->back()->with('success', 'Verification code sent successfully. Please check your email.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
