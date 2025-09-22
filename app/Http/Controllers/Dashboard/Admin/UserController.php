<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserControllerUpdateRequest;
use App\Trait\FileUpload;

class UserController extends Controller
{
    use FileUpload;
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index'), 'active' => true],
        ];

        $users = User::where('role', 'user')->latest()->get();

        $data = [
            'title' => 'Users',
            'breadcrumbs' => $breadcrumbs,
            'users' => $users
        ];

        return view('dashboard.admin.user.index', $data);
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'User Details', 'url' => route('admin.user.show', $uuid), 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->first();

        $data = [
            'title' => 'User Details',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user
        ];

        return view('dashboard.admin.user.show', $data);
    }

    public function update(UserControllerUpdateRequest $request, string $uuid)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->where('role', 'user')->firstOrFail();

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            } else {
                unset($data['password']);
            }

            $data['image'] = $this->imageInterventionUpdateFile($request, 'image', '/uploads/dashboard/user/image/', 400, 400, $user?->image);

            $user->update($data);

            DB::commit();

            return response()->json(['message' => 'User updated successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
