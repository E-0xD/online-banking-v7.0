<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Notification', 'url' => route('user.notification.index'), 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $notifications  = $user->notification()->latest()->get();

        $data = [
            'title' => 'Notification',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'notifications' => $notifications
        ];

        return view('dashboard.user.notification.index', $data);
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Notification', 'url' => route('user.notification.index'), 'active' => true],
            ['label' => 'Notification Details', 'url' => route('user.notification.show', $uuid), 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $notification  = $user->notification()->where('uuid', $uuid)->firstOrFail();

        $notification->read = true;
        $notification->save();

        $data = [
            'title' => 'Notification Details',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'notification' => $notification
        ];

        return view('dashboard.user.notification.show', $data);
    }

    public function readAll()
    {
        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
            $user->notification()->update(['read' => true]);

            DB::commit();

            return redirect()->route('user.notification.index')->with('success', 'All Notifications read successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('user.notification.index')->with('error', config('app.messages.error'));
        }
    }
}
