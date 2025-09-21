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
            <div class="col-md-12">
                <x-dashboard.user.card>
                    @slot('header')
                        <h3>Account Information</h3>
                        <p>To comply with regulations, please provide your information to complete the verification process.</p>
                    @endslot

                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-dashboard.user.card>
                            @slot('header')
                                <h3>Personal Details</h3>
                                <p>Your personal information required for identification</p>
                            @endslot

                            <p>Kindly provide the information requested below to enable us to create an account for you.</p>

                            <div class="row">
                                <x-dashboard.user.form-input name="name" label="Name" class="col-md-6 mb-3"
                                    value="{{ $user->name }}" />

                                <x-dashboard.user.form-input name="middle_name" label="Middle Name" class="col-md-6 mb-3"
                                    value="{{ $user->middle_name }}" />

                                <x-dashboard.user.form-input name="last_name" label="Last Name" class="col-md-6 mb-3"
                                    value="{{ $user->last_name }}" />

                                <x-dashboard.user.form-input name="email" label="Email Address" class="col-md-6 mb-3"
                                    value="{{ $user->email }}" />

                                <x-dashboard.user.form-input name="phone" label="Phone Number" class="col-md-6 mb-3"
                                    value="{{ $user->phone }}" />

                                <x-dashboard.user.form-select name="title" label="Title" type="select"
                                    class="col-md-6 mb-3" value="{{ @$user->title }}" :options="config('setting.titles')" />

                                <x-dashboard.user.form-select name="gender" label="Gender" type="select"
                                    class="col-md-6 mb-3" value="{{ $user->gender }}" :options="config('setting.genders')" />

                                <x-dashboard.user.form-input name="zip_code" label="Zip Code" class="col-md-6 mb-3"
                                    value="{{ @$user->zip_code }}" />

                                <x-dashboard.user.form-input name="dob" label="Date of Birth" type="date"
                                    class="col-md-6 mb-3" value="{{ $user->dob }}" />
                            </div>

                        </x-dashboard.user.card>
                    </form>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
