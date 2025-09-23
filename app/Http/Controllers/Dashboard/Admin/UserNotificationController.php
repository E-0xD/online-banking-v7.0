<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class UserNotificationController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Notifications', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $notifications = $user->notification()->latest()->get();

        $data = [
            'title' => 'Notifications',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
            'notifications' => $notifications
        ];

        return view('dashboard.admin.user.notification.index', $data);
    }

    public function create(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Notifications', 'url' => route('admin.user.notification.index', $uuid)],
            ['label' => 'Create Notification', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Create Notification',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.user.notification.create', $data);
    }

    public function show(string $uuid, string $notificationUUID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Notification Details', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $notification = $user->notification()->where('uuid', $notificationUUID)->firstOrFail();

        $data = [
            'title' => 'Notification Details',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
            'notification' => $notification
        ];

        return view('dashboard.admin.user.notification.show', $data);
    }

    public function delete(string $uuid, string $notificationUUID)
    {

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();

            $notification = Notification::where('uuid', $notificationUUID)->firstOrFail();
            $notification->delete();

            DB::commit();

            return redirect()->route('admin.user.notification.index', $uuid)->with('success', 'Notification deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.user.notification.index', $uuid)->with('error', config('app.messages.error'));
        }
    }
    public function deleteAll(string $uuid)
    {
        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();

            $user->notification()->delete();

            DB::commit();

            return redirect()->route('admin.user.notification.index', $uuid)->with('success', 'All Notifications deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.user.notification.index', $uuid)->with('error', config('app.messages.error'));
        }
    }
}
