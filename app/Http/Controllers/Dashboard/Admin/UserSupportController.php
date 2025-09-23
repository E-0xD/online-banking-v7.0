<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Mail\SupportReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserSupportController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index', $uuid)],
            ['label' => 'Support Ticket', 'url' => route('admin.user.support.index', $uuid), 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $supports = $user->support()->latest()->get();

        $data = [
            'title' => 'Support Ticket',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
            'supports' => $supports
        ];

        return view('dashboard.admin.user.support.index', $data);
    }

    public function show(string $uuid, string $supportUUID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Support Ticket', 'url' => route('admin.user.support.index', $uuid)],
            ['label' => 'Support Ticket Details', 'url' => route('admin.user.support.show', [$uuid, $supportUUID]), 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $support = $user->support()->where('uuid', $supportUUID)->firstOrFail();

        $data = [
            'title' => 'Support Ticket Details',
            'user' => $user,
            'support' => $support,
            'breadcrumbs' => $breadcrumbs
        ];

        return view('dashboard.admin.user.support.show', $data);
    }

    public function store(Request $request, $uuid, $supportUUID)
    {
        $request->validate([
            'status' => ['required', 'string'],
            'reply_message' => ['required', 'string']
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $support = $user->support()->where('uuid', $supportUUID)->firstOrFail();

            $support->status = $request->status;
            $support->save();

            Mail::to($user->email)->queue(new SupportReply($user, $support, $request->reply_message));

            DB::commit();
            return redirect()->route('admin.user.support.show', [$uuid, $supportUUID])->with('success', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function delete(string $uuid, string $supportUUID)
    {
        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $support = $user->support()->where('uuid', $supportUUID)->firstOrFail();

            $support->delete();

            DB::commit();
            return redirect()->route('admin.user.support.index', $uuid)->with('success', config('app.messages.success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
