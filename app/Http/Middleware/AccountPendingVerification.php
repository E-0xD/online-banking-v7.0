<?php

namespace App\Http\Middleware;

use App\Enum\UserAccountState;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccountPendingVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        if ($user && $user->account_state->value === UserAccountState::PendingVerification->value) {
            // Block all financial transactions until verified
            if (
                $request->routeIs('user.transfer.*') ||
                $request->routeIs('user.grant_application.*') ||
                $request->routeIs('user.deposit.*') ||
                $request->routeIs('user.loan.*') ||
                $request->routeIs('user.irs_tax_refund.*') ||
                $request->routeIs('user.card.*')
            ) {
                return redirect()->route('user.dashboard')->with(
                    'error',
                    'Your account is pending verification. You can log in and view your profile, but this feature is temporarily disabled until your verification is completed.'
                );
            }
        }

        return $next($request);
    }
}
