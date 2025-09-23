<?php

namespace App\Http\Controllers\Dashboard\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllerUpdateRequest;
use App\Models\User;
use App\Trait\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Admins', 'active' => true]
        ];

        $data = [
            'title' => 'Admins',
            'breadcrumbs' => $breadcrumbs,
            'admins' => User::where('role', 'admin')->latest()->get()
        ];

        return view('dashboard.master.admin.index', $data);
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Admins', 'url' => route('master.admin.index')],
            ['label' => 'Admin Details', 'active' => true]
        ];

        $admin = User::where('uuid', $uuid)->first();

        $data = [
            'title' => 'Admin Details',
            'breadcrumbs' => $breadcrumbs,
            'admin' => $admin,
        ];

        return view('dashboard.master.admin.show', $data);
    }
    public function edit(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Admins', 'url' => route('master.admin.index')],
            ['label' => 'Edit Admin', 'active' => true]
        ];

        $admin = User::where('uuid', $uuid)->first();

        $data = [
            'title' => 'Edit Admin',
            'breadcrumbs' => $breadcrumbs,
            'admin' => $admin,
        ];

        return view('dashboard.master.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminControllerUpdateRequest $request, string $uuid)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $admin = User::where('uuid', $uuid)->where('role', 'admin')->firstOrFail();

            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->status = $request->status;

            if ($request->password) {
                $admin->password = Hash::make($request->password);
            }

            $admin->save();

            DB::commit();
            return redirect()->route('master.admin.index')->with('success', 'Admin updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
