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
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Support Center', 'url' => route('user.support.index'), 'active' => true]
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

        // dd($data);

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
}
