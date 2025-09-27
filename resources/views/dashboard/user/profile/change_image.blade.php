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

                        <x-dashboard.user.form-input name="image" type="file" class="col-md-12 mb-3" />

                        <x-dashboard.user.submit-and-back-button href="{{ route('user.profile.index') }}"
                            back="Back to Profile" submit="Change Image" class="btn btn-primary" />
                    </form>

                </x-dashboard.user.card>

                <x-dashboard.user.info-list title="How to change your profile image" :options="[
                    'Click on the Choose File button.',
                    'Select the image file you want to upload.',
                    'Click on the Change Image button.',
                    'Your profile image will be updated.',
                ]" />

                <x-dashboard.user.support-card />
            </div>
        </div>
    </div>
@endsection
