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

                    <form action="{{ route('admin.verification_code.update', $verificationCode->uuid) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <x-dashboard.admin.form-input name="name" label="Name *" value="{{ old('name') }}"
                                class="col-md-6 mb-3" value="{{ $verificationCode->name }}" />

                            <x-dashboard.admin.form-input name="description" label="Description"
                                value="{{ old('description') }}" formText="What this code is all about"
                                class="col-md-6 mb-3" value="{{ $verificationCode->description }}" />

                            <x-dashboard.admin.form-input name="length" label="Length *" value="{{ old('length', 7) }}"
                                formText="How long do you want this code to be when generated?" class="col-md-6 mb-3"
                                value="{{ $verificationCode->length }}" />

                            <div class="col-md-6 mb-3">
                                <label for="nature_of_code" class="form-label">Nature of code *</label>
                                <select id="nature_of_code" name="nature_of_code"
                                    class="form-select @error('nature_of_code') is-invalid @enderror" required>
                                    <option value="alnum"
                                        {{ old('nature_of_code', $verificationCode->nature_of_code) === 'alnum' ? 'selected' : '' }}>
                                        Alphanumeric
                                    </option>
                                    <option value="numeric"
                                        {{ old('nature_of_code', $verificationCode->nature_of_code) === 'numeric' ? 'selected' : '' }}>
                                        Numeric</option>
                                </select>
                                @error('nature_of_code')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-muted">
                                    Do you want this code to be a mixture of letters and numbers (alphanumeric) or just
                                    numbers (numeric)?
                                </small>
                            </div>

                            <div class="mb-3">
                                <label for="applicable_to" class="form-label">Applicable to user *</label>
                                <select id="applicable_to" name="applicable_to"
                                    class="form-select @error('applicable_to') is-invalid @enderror" required>
                                    <option value="All" {{ old('applicable_to', 'All') === 'All' ? 'selected' : '' }}>
                                        ALL USERS
                                    </option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('applicable_to', $verificationCode->applicable_to) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name . ' ' . $user->middle_name . ' ' . $user->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('applicable_to')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <x-dashboard.admin.submit-and-back-button href="{{ route('admin.verification_code.index') }}"
                                submit="Update" />
                        </div>
                    </form>

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
