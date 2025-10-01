<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationCodeControllerStoreRequest;
use App\Http\Requests\VerificationCodeControllerUpdateRequest;

class VerificationCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Verification Codes', 'active' => true],
        ];

        $verificationCodes = VerificationCode::with(['user'])->latest()->get();

        $data = [
            'title' => 'Verification Codes',
            'breadcrumbs' => $breadcrumbs,
            'verificationCodes' => $verificationCodes
        ];

        return view('dashboard.admin.verification_code.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Verification Codes', 'url' => route('admin.verification_code.index')],
            ['label' => 'Create Verification Code', 'active' => true],
        ];

        $users = User::latest()->get();

        $data = [
            'title' => 'Create Verification Code',
            'breadcrumbs' => $breadcrumbs,
            'users' => $users
        ];

        return view('dashboard.admin.verification_code.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VerificationCodeControllerStoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $data['uuid'] = str()->uuid();
            VerificationCode::create($data);

            DB::commit();

            return redirect()->route('admin.verification_code.index')->with('success', 'Verification code created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.verification_code.index')->with('error', config('app.messages.error'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Verification Codes', 'url' => route('admin.verification_code.index')],
            ['label' => 'Verification Code Details', 'active' => true],
        ];

        $verificationCode = VerificationCode::with(['user'])->where('uuid', $uuid)->first();

        $data = [
            'title' => 'Verification Code Details',
            'breadcrumbs' => $breadcrumbs,
            'verificationCode' => $verificationCode,
        ];

        return view('dashboard.admin.verification_code.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Verification Codes', 'url' => route('admin.verification_code.index')],
            ['label' => 'Edit Verification Code', 'active' => true],
        ];

        $users = User::latest()->get();

        $verificationCode = VerificationCode::with(['user'])->where('uuid', $uuid)->first();

        $data = [
            'title' => 'Edit Verification Code',
            'breadcrumbs' => $breadcrumbs,
            'users' => $users,
            'verificationCode' => $verificationCode,
        ];

        return view('dashboard.admin.verification_code.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VerificationCodeControllerUpdateRequest $request, string $uuid)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $verificationCode = VerificationCode::where('uuid', $uuid)->first();

            $verificationCode->update($data);

            DB::commit();

            return redirect()->route('admin.verification_code.index')->with('success', 'Verification code updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.verification_code.index')->with('error', config('app.messages.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $uuid)
    {
        try {
            DB::beginTransaction();

            $verificationCode = VerificationCode::where('uuid', $uuid)->firstOrFail();
            $verificationCode->delete();

            DB::commit();

            return redirect()->route('admin.verification_code.index')->with('success', 'Verification code deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.verification_code.index')->with('error', config('app.messages.error'));
        }
    }
}
