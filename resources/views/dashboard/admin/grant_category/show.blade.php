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

                    <dl class="row">

                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $grantCategory->name }}</dd>

                        <dt class="col-sm-3">Description</dt>
                        <dd class="col-sm-9">{{ $grantCategory->description }}</dd>

                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">{{ $grantCategory->status }}</dd>

                        <dt class="col-sm-3">Date</dt>
                        <dd class="col-sm-9">{{ formatDate($grantCategory->created_at) }}</dd>

                    </dl>

                    <x-dashboard.admin.back-button href="{{ route('admin.grant_category.index') }}" />

                    <div class="float-end">
                        <a href="{{ route('admin.grant_category.edit', $grantCategory->uuid) }}"
                            class="btn btn-primary  btn-sm m-1">
                            <i class="ti ti-edit me-1">
                            </i>Edit </a>
                        <form action="{{ route('admin.grant_category.delete', $grantCategory->uuid) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger  btn-sm m-1"
                                onclick="return confirm('Are you sure?')">
                                <i class="ti ti-trash me-1">
                                </i>Delete </button>
                        </form>
                    </div>

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
