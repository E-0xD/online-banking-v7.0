<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\NewPasswordControllerStoreRequest;

class NewPasswordController extends Controller
{
    public function create(Request $request)
    {
        $data = [
            'title' => 'Reset Password',
            'request' => $request,
        ];

        return view('auth.reset_password', $data);
    }

    public function store(NewPasswordControllerStoreRequest $request)
    {
        $request->validated();

        try {
            $user = User::where('role', 'user')->where('email', $request->email)->first();
            if (!$user) {
                return redirect()->route('login')->with('error', 'User not found');
            }

            $passwordResetToken = PasswordResetToken::where('email', $request->email)
                ->where('token', $request->token)
                ->first();

            if (!$passwordResetToken) {
                return redirect()->route('login')->with('error', 'Invalid or expired token');
            }

            if (isset($passwordResetToken->created_at) && $passwordResetToken->created_at->addHours(2)->isPast()) {
                return redirect()->route('login')->with('error', 'Token has expired');
            }

            DB::beginTransaction();

            $user->password = Hash::make($request->password);
            $user->save();

            $passwordResetToken->delete();

            DB::commit();

            return redirect()->route('login')->with('success', 'Password changed successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('login')->with('error', config('app.messages.error'));
        }
    }
}
