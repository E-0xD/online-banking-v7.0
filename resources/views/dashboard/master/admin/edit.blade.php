@extends('dashboard.master.layouts.app')
@section('content')
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-dashboard.master.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('master.admin.update', $admin->uuid) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <x-dashboard.master.form-input name="name" label="Name" value="{{ $admin->name }}" />
                                <x-dashboard.master.form-input name="email" label="Email" value="{{ $admin->email }}" />
                                <x-dashboard.master.form-input name="password" id="new_password" label="Password"
                                    type="password" />

                                <div class="col-md-6 mb-3">
                                    <label for="example-select" class="form-label">Status</label>
                                    <select id="example-select" name="status"
                                        class="form-select @error('status') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        @foreach (config('setting.userStatuses') as $key => $value)
                                            <option value="{{ $key }}" @selected(old('status', $admin->status->value) == $key)>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <x-dashboard.master.submit-and-back-button href="{{ route('master.admin.index') }}" />

                            </div>
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
