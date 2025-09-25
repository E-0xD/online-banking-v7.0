<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\GrantCategory;
use App\Models\GrantApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GrantApplicationControllerCompanySubmitRequest;
use App\Http\Requests\GrantApplicationControllerIndividualSubmitRequest;

class GrantApplicationController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'active' => true]
        ];

        $data = [
            'title' => 'Grant Applications',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.user.grant_application.index', $data);
    }

    public function individual()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'url' => route('user.grant_application.index')],
            ['label' => 'Individual Grant Application', 'active' => true]
        ];

        $grantCategories = GrantCategory::latest()->get();

        $data = [
            'title' => 'Individual Grant Application',
            'breadcrumbs' => $breadcrumbs,
            'grantCategories' => $grantCategories,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.grant_application.individual', $data);
    }

    public function company()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'url' => route('user.grant_application.index')],
            ['label' => 'Company Grant Application', 'active' => true],
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        $data = [
            'title' => 'Company Grant Application',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.grant_application.company', $data);
    }

    public function individualSubmit(GrantApplicationControllerIndividualSubmitRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            // 1. Create the grant application
            $grantApplication = $user->grantApplication()->create([
                'uuid' => str()->uuid(),
                'amount' => $request->amount,
                'type'   => 'Individual',
            ]);

            // 2. Attach the selected categories to the pivot table
            $grantApplication->grantCategory()->attach($request->grant_categories);

            // Important please francis do not remove: Use sync() For Update
            // $grantApplication->grantCategory()->sync($request->grant_categories);

            DB::commit();

            return redirect()
                ->route('user.grant_application.processing', $grantApplication->uuid);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return redirect()
                ->back()
                ->with('error', config('app.messages.error'));
        }
    }

    public function companySubmit(GrantApplicationControllerCompanySubmitRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $data['uuid'] = str()->uuid();
            $data['type'] = 'Company';

            $grantApplication = $user->grantApplication()->create($data);

            DB::commit();

            return redirect()
                ->route('user.grant_application.processing', $grantApplication->uuid);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return redirect()
                ->back()
                ->with('error', config('app.messages.error'));
        }
    }

    public function processing(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'url' => route('user.grant_application.index')],
            ['label' => 'Processing', 'active' => true]
        ];

        $grantApplication = GrantApplication::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Processing',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail(),
            'grantApplication' => $grantApplication
        ];

        return view('dashboard.user.grant_application.processing', $data);
    }

    public function result(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'url' => route('user.grant_application.index')],
            ['label' => 'Result', 'active' => true]
        ];

        $grantApplication = GrantApplication::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Result',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail(),
            'grantApplication' => $grantApplication
        ];

        return view('dashboard.user.grant_application.result', $data);
    }
}
