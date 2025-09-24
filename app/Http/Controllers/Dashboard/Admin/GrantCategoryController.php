<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;
use App\Models\GrantCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class GrantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Grant Categories', 'active' => true]
        ];

        $grantCategories = GrantCategory::latest()->get();

        $data = [
            'title' => 'Grant Categories',
            'grantCategories' => $grantCategories,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.grant_category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Grant Categories', 'url' => route('admin.grant_category.index')],
            ['label' => 'Create Grant Category', 'active' => true]
        ];

        $data = [
            'title' => 'Create Grant Category',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.grant_category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();

            $data['uuid'] = str()->uuid();
            $data['slug'] = str()->slug($data['name']);

            $grantCategory = GrantCategory::create($data);

            DB::commit();

            return redirect()->route('admin.grant_category.show', $grantCategory->uuid)->with('success', 'Grant Category created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Grant Categories', 'url' => route('admin.grant_category.index')],
            ['label' => 'Grant Category Details', 'active' => true]
        ];

        $grantCategory = GrantCategory::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Grant Category Details',
            'breadcrumbs' => $breadcrumbs,
            'grantCategory' => $grantCategory,
        ];

        return view('dashboard.admin.grant_category.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Grant Categories', 'url' => route('admin.grant_category.index')],
            ['label' => 'Edit Grant Category', 'active' => true]
        ];

        $grantCategory = GrantCategory::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Edit Grant Category',
            'breadcrumbs' => $breadcrumbs,
            'grantCategory' => $grantCategory,
        ];

        return view('dashboard.admin.grant_category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();

            $grantCategory = GrantCategory::where('uuid', $uuid)->firstOrFail();

            $data['slug'] = str()->slug($data['name']);
            $grantCategory->update($data);

            DB::commit();

            return redirect()->route('admin.grant_category.show', $grantCategory->uuid)->with('success', 'Grant Category updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        try {
            DB::beginTransaction();

            $grantCategory = GrantCategory::where('uuid', $uuid)->firstOrFail();
            $grantCategory->delete();

            DB::commit();

            return redirect()->route('admin.grant_category.index')->with('success', 'Grant Category deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
