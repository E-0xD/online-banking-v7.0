<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\EmailVerificationCode;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisteredUserControllerStoreRequest;
use App\Mail\Welcome;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $data = ['title' => 'Create Account'];

        return view('auth.register', $data);
    }

    public function store(RegisteredUserControllerStoreRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $data = [
                'uuid' => str()->uuid(),
                'name' => $request->name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email' => $request->email,
                'email_code' => getRandomNumber(6),
                'email_code_expires_at' => now()->addMinutes(60),
                'phone' => $request->phone,
                'country' => $request->country,
                'currency' => $request->currency,
                'account_type' => $request->account_type,
                'transaction_pin' => $request->transaction_pin,
                'account_number' => getAccountNumber(),
                'password' => Hash::make($request->password),
            ];

            $user = User::create($data);

            Auth::login($user);

            Mail::to($user->email)->queue(new EmailVerificationCode($user, 'Email Verification Code'));
            Mail::to($user->email)->later(now()->addSeconds(30), new Welcome($user));

            DB::commit();

            return redirect()->route('verify.email');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
