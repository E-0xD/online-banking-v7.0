@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-dashboard.admin.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <x-dashboard.admin.card>
                    @slot('header')
                        {{ $title }}
                    @endslot

                    <form action="{{ route('admin.grant_category.update', $grantCategory->uuid) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <x-dashboard.admin.form-input name="name" value="{{ old('name', $grantCategory->name) }}"
                            label="Name" placeholder="Enter category name" type="text" class="col-md-12 mb-3" />

                        <x-dashboard.admin.form-input name="description"
                            value="{{ old('description', $grantCategory->description) }}" label="Description"
                            placeholder="Enter category description" type="textarea" class="col-md-12 mb-3" />

                        <x-dashboard.admin.form-select name="status" id="grant_category_status" label="Status"
                            type="select" value="{{ old('status', $grantCategory->status) }}" class="col-md-12 mb-3"
                            :options="config('setting.grantCategoryStatuses')" />

                        <x-dashboard.admin.submit-and-back-button href="{{ route('admin.grant_category.index') }}"
                            back="Back to Grant Categories" submit="Update" />
                    </form>

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
