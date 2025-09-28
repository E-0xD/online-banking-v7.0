<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Enum\GrantCategoryStatus;
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
    public function __construct()
    {
        $this->middleware([
            'registeredUser',
            'accountDormant',
            'accountRestricted',
            'accountFrozen',
            'accountPendingVerification'
        ]);
    }

    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $data = [
            'title' => 'Grant Applications',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user
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

        $grantCategories = GrantCategory::where('status', GrantCategoryStatus::Active->value)->latest()->get();

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
                'reference_id' => generateReferenceId()
            ]);

            // 2. Attach the selected categories to the pivot table
            $grantApplication->grantCategory()->attach($request->grant_categories);

            // Important please francis do not remove: Use sync() For Update
            // $grantApplication->grantCategory()->sync($request->grant_categories);

            // Create notification
            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'Grant Application',
                'description' => 'Your grant application Reference ID ' . $grantApplication->reference_id . ' has been submitted.',
            ]);

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
            $data['reference_id'] = generateReferenceId();

            $grantApplication = $user->grantApplication()->create($data);

            // Create notification
            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'Grant Application',
                'description' => 'Your grant application Reference ID ' . $grantApplication->reference_id . ' has been submitted.',
            ]);

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

    public function Withdrawn(Request $request, string $uuid)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();

            $grantApplication = GrantApplication::where('uuid', $uuid)->firstOrFail();

            $grantApplication->update([
                'status' => $request->status
            ]);

            DB::commit();

            return redirect()
                ->route('user.grant_application.result', $grantApplication->uuid);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return redirect()
                ->back()
                ->with('error', config('app.messages.error'));
        }
    }

    public function history()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'url' => route('user.grant_application.index')],
            ['label' => 'History', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $grantApplications = $user->grantApplication()->latest()->get();

        $data = [
            'title' => 'History',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'grantApplications' => $grantApplications
        ];

        return view('dashboard.user.grant_application.history', $data);
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Grant Applications', 'url' => route('user.grant_application.index')],
            ['label' => 'Grant Application Details', 'active' => true],
        ];

        $grantApplication = GrantApplication::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Grant Application Details',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail(),
            'grantApplication' => $grantApplication
        ];

        return view('dashboard.user.grant_application.show', $data);
    }
}
