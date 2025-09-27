<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $setting = Setting::first();
        
        $data = [
            'title' => 'Home',
            'setting' => $setting
        ];

        return view('frontend.home', $data);
    }
}
