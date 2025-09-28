<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SupportControllerStoreRequest;
use App\Models\Support;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['registeredUser']);
    }

    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Support Center', 'active' => true]
        ];

        $data = [
            'title' => 'Support Center',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.user.support.index', $data);
    }

    public function store(SupportControllerStoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $data['uuid'] = str()->uuid();
            $data['user_id'] = $user->id;

            Support::create($data);

            DB::commit();

            return redirect()->back()->with('success', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function history()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Support History', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $supports = $user->support()->latest()->get();

        $data = [
            'title' => 'Support History',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'supports' => $supports
        ];

        return view('dashboard.user.support.history', $data);
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Support History', 'url' => route('user.support.history')],
            ['label' => 'Ticket Details', 'active' => true],
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $support = $user->support()->where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Ticket Details',
            'user' => $user,
            'support' => $support,
            'breadcrumbs' => $breadcrumbs
        ];

        return view('dashboard.user.support.show', $data);
    }
}
