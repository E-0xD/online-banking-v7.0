<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enum\UserAccountState;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccountFrozen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->account_state->value === UserAccountState::Frozen->value) {
            // Block deposit, withdraw, and transfer
            if (
                $request->routeIs('user.deposit.*') ||
                $request->is('user/transfer*')
            ) {
                return redirect()->route('user.dashboard')->with(
                    'error',
                    'Your account is frozen. You can view your balance and history, but you cannot deposit or transfer funds until the freeze is lifted. Please contact support.'
                );
            }
        }

        return $next($request);
    }
}
