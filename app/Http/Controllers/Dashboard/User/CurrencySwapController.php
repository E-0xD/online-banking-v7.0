<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class CurrencySwapController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'registeredUser',
            'accountDormant',
            'accountRestricted',
            'accountFrozen',
            'accountPendingVerification'
        ]);
    }

    public function index()
    {
        try {
            $title = 'Currency Swap';

            return view('dashboard.user.currency_swap.index', compact('title'));
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'An Error Occurred');
            return redirect()->route('user.dashboard');
        }
    }
}
