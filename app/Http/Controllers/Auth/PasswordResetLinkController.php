<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PasswordResetLink;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PasswordResetLinkControllerStoreRequest;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        $data = ['title' => 'Forgot Password'];

        return view('auth.forgot_password', $data);
    }

    public function store(PasswordResetLinkControllerStoreRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            if (!$user) {
                DB::rollBack();
                return redirect()->back()->withErrors(['email' => 'No user found with this email.']);
            }

            $token = Str::random(64);

            PasswordResetToken::updateOrCreate(
                ['email' => $user->email],
                [
                    'token' => $token,
                    'created_at' => now()
                ]
            );

            $passwordResetToken = PasswordResetToken::where('email', $user->email)->first();

            $passwordResetLink = route('password.reset', [
                'token' => $passwordResetToken->token,
                'email' => $passwordResetToken->email
            ]);

            Mail::to($user->email)->queue(new PasswordResetLink($user, $passwordResetLink, 'Password Reset Link'));

            DB::commit();

            return redirect()->back()->with('success', 'Password reset link sent successfully. Please check your email.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
