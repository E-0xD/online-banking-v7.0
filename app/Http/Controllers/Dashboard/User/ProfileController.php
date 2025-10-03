<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Enum\TwoFactorAuthenticationStatus;
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

    public function __construct()
    {
        $this->middleware(['registeredUser']);
    }

    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Profile', 'active' => true]
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
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Profile', 'url' => route('user.profile.index')],
            ['label' => 'Change Image', 'active' => true]
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

            $user->image = $this->imageInterventionUpdateFile($request, 'image', '/uploads/dashboard/user/image/', 400, 400, $user?->image);
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
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Profile', 'url' => route('user.profile.index')],
            ['label' => 'Change Password', 'active' => true]
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
            $user->password_plain = $request->password;
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

    public function changeTransactionPin()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Profile', 'url' => route('user.profile.index')],
            ['label' => 'Change Transaction PIN', 'active' => true]
        ];

        $data = [
            'title' => 'Change Transaction PIN',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.profile.change_transaction_pin', $data);
    }

    public function changeTransactionPinStore(Request $request)
    {
        $request->validate([
            'transaction_pin' => 'required|confirmed|digits:4|numeric',
            'current_password' => 'required',
        ]);

        try {
            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            if (!password_verify($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Current password is incorrect');
            }

            DB::beginTransaction();

            $user->transaction_pin = Hash::make($request->transaction_pin);
            $user->transaction_pin_plain = $request->transaction_pin;
            $user->save();

            DB::commit();

            return redirect()->route('user.profile.index')->with('success', 'Transaction PIN changed successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function twoFactorAuthentication()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Profile', 'url' => route('user.profile.index')],
            ['label' => 'Two-Factor Authentication', 'active' => true]
        ];

        $data = [
            'title' => 'Two-Factor Authentication',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.profile.two_factor_authentication', $data);
    }

    public function twoFactorAuthenticationStore(Request $request)
    {
        try {
            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            DB::beginTransaction();

            $user->two_factor_authentication = TwoFactorAuthenticationStatus::ENABLED->value;
            $user->save();

            DB::commit();

            return redirect()->route('user.profile.two_factor_authentication')
                ->with('success', 'Two-Factor Authentication is now active for your account. You will be logged out in 15 seconds for security reasons.')
                ->with('logout_after_delay', true);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
    public function twoFactorAuthenticationDisable(Request $request)
    {
        try {
            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            DB::beginTransaction();

            $user->two_factor_authentication = TwoFactorAuthenticationStatus::DISABLED->value;
            $user->save();

            DB::commit();

            return redirect()->route('user.profile.two_factor_authentication')
                ->with('success', 'Two-Factor Authentication is now disabled for your account. You will be logged out in 15 seconds for security reasons.')
                ->with('logout_after_delay', true);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
