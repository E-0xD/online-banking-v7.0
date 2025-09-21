<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Verify Your Identity', 'url' => route('user.kyc.index'), 'active' => true]
        ];

        $data = [
            'title' => 'Verify Your Identity',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.kyc.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Verify Your Identity', 'url' => route('user.kyc.index')],
            ['label' => 'KYC Verification', 'url' => route('user.kyc.form'), 'active' => true]
        ];

        $data = [
            'title' => 'KYC Verification',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.kyc.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
