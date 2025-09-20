@extends('dashboard.user.layouts.app')
@section('content')
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-dashboard.user.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <x-dashboard.user.card>
                    @slot('header')
                        Change your profile image
                    @endslot

                    <form action="{{ route('user.profile.change_image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <x-dashboard.user.form-input name="image" label="Image" type="file" class="col-md-12 mb-3" />

                        <x-dashboard.user.form-button class="btn btn-primary" />
                    </form>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
