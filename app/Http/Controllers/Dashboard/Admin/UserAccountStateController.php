<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\UserStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class UserAccountStateController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'User Account State', 'url' => route('admin.user.account_state.index', $uuid), 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'User Account State',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.user.account_state.index', $data);
    }

    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'account_state' => ['required'],
            'account_state_message' => ['nullable']
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            if ($user->account_state === 'Disabled') {
                $user->account_state = $request->account_state;
                $user->account_state_message = $request->account_state_message;
                $user->status = UserStatus::INACTIVE->value;

                $user->save();
            }

            $user->account_state = $request->account_state;
            $user->account_state_message = $request->account_state_message;
            $user->status = UserStatus::ACTIVE->value;

            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'User account state updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
