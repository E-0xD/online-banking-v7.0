<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAccountStateController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'User Account State', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'User Account State',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.user.account_state.index', $data);
    }

    public function store(Request $request, $uuid)
    {
        $request->validate([
            'account_state' => ['required'],
            'account_state_message' => ['nullable'],
        ]);

        try {

            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();

            $user->account_state = $request->account_state;
            $user->account_state_message = $request->account_state_message;
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'User account state updated successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
