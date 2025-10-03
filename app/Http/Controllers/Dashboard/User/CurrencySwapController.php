<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurrencySwapController extends Controller
{
    public function index()
    {
        $title = 'Currency Swap';

        return view('dashboard.user.currency_swap.index', compact('title'));
    }
}
