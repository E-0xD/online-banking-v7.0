<?php

namespace App\Http\Middleware;

use App\Enum\UserAccountState;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccountDormant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->account_state->value === UserAccountState::Dormant->value) {
            return redirect()->route('user.dashboard')->with(
                'warning',
                'Your account is dormant due to inactivity. Please contact support to reactivate it.'
            );
        }

        return $next($request);
    }
}
