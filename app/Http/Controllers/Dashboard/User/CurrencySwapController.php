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
            $breadcrumbs = [
                ['label' => config('app.name'), 'url' => '/'],
                ['label' => 'Dashboard', 'url' => route('user.dashboard')],
                ['label' => 'Currency Swap', 'active' => true]
            ];

            $data = [
                'title' => 'Currency Swap',
                'breadcrumbs' => $breadcrumbs
            ];

            return view('dashboard.user.currency_swap.index', $data);
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'An Error Occurred');
            return redirect()->route('user.dashboard');
        }
    }
}
