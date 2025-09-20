<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Trait\FileUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    use FileUpload;
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Profile', 'url' => route('user.profile.index'), 'active' => true]
        ];

        $data = [
            'title' => 'Profile',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.profile.index', $data);
    }

    public function changeImage()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Profile', 'url' => route('user.profile.index')],
            ['label' => 'Change Image', 'url' => route('user.profile.change_image'), 'active' => true]
        ];

        $data = [
            'title' => 'Change Image',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.profile.change_image', $data);
    }

    public function changeImageStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $user->image = $this->imageInterventionUpdateFile($request, 'image', '/uploads/dashboard/user/image/', 400, 400, $user?->image);;
            $user->save();

            DB::commit();

            return redirect()->route('user.profile.index')->with('success', 'Image changed successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function changePassword()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Profile', 'url' => route('user.profile.index')],
            ['label' => 'Change Password', 'url' => route('user.profile.change_password'), 'active' => true]
        ];

        $data = [
            'title' => 'Change Password',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.profile.change_password', $data);
    }

    public function changePasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            if (!password_verify($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Current password is incorrect');
            }

            DB::beginTransaction();

            $user->password = Hash::make($request->password);
            $user->save();

            DB::commit();

            return redirect()
                ->route('user.profile.index')
                ->with('success', 'Password changed successfully. You will be logged out in 15 seconds for security reasons.')
                ->with('logout_after_delay', true);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
