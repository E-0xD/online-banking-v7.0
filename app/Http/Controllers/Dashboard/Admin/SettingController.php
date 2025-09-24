<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Settings', 'active' => true],
        ];

        $data = [
            'title' => 'Settings',
            'breadcrumbs' => $breadcrumbs,
            'setting' => Setting::first()
        ];

        return view('dashboard.admin.setting.index', $data);
    }
}
