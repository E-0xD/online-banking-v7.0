<?php

namespace App\Http\Middleware;

use App\Enum\UserAccountState;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccountRestricted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->account_state->value === UserAccountState::Restricted->value) {
            // If the request is for sensitive actions (withdraw/transfer), block it
            if ($request->routeIs('user.transfer.*')) {
                return redirect()->route('user.dashboard')->with(
                    'error',
                    'Your account is restricted. You can view your balance but cannot transfer funds. Please contact support for assistance.'
                );
            }
        }

        return $next($request);
    }
}
