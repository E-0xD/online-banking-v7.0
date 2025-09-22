<?php

namespace App\Http\Controllers\Dashboard\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
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
}
