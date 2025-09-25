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
            @include('dashboard.admin.user.partials.account_options_and_status')

            <div class="col-lg-12">
                <x-dashboard.admin.card>
                    @slot('header')
                        User {{ $title }}
                    @endslot

                    <dl class="row">
                        @if ($grantApplication->type === 'Company')
                            <dt class="col-sm-3">Organization Name</dt>
                            <dd class="col-sm-9">{{ $grantApplication->name }}</dd>

                            <dt class="col-sm-3">Tax ID</dt>
                            <dd class="col-sm-9">{{ $grantApplication->tax_id }}</dd>

                            <dt class="col-sm-3">Organization Type</dt>
                            <dd class="col-sm-9">{{ $grantApplication->organization_type }}</dd>

                            <dt class="col-sm-3">Founding Year</dt>
                            <dd class="col-sm-9">{{ $grantApplication->founding_year }}</dd>

                            <dt class="col-sm-3">Mailing Address</dt>
                            <dd class="col-sm-9">
                                <address>
                                    {{ $grantApplication->full_mailing_address }}
                                </address>
                            </dd>

                            <dt class="col-sm-3">Contact Phone</dt>
                            <dd class="col-sm-9">
                                {{ $grantApplication->contact_phone }}
                            </dd>

                            <dt class="col-sm-3">Contact Person</dt>
                            <dd class="col-sm-9">
                                {{ $grantApplication->contact_person }}
                            </dd>

                            <dt class="col-sm-3">Mission Statement</dt>
                            <dd class="col-sm-9">
                                {{ $grantApplication->mission_statement }}
                            </dd>

                            <dt class="col-sm-3">Date Of Incorporation</dt>
                            <dd class="col-sm-9">
                                {{ formatDate($grantApplication->date_of_incorporation) }}
                            </dd>

                            <dt class="col-sm-3">Project Title</dt>
                            <dd class="col-sm-9">
                                {{ $grantApplication->contact_person }}
                            </dd>

                            <dt class="col-sm-3">Project Description</dt>
                            <dd class="col-sm-9">
                                {{ $grantApplication->project_description }}
                            </dd>

                            <dt class="col-sm-3">Expected Outcome</dt>
                            <dd class="col-sm-9">
                                {{ $grantApplication->expected_outcome }}
                            </dd>

                            <dt class="col-sm-3">Amount</dt>
                            <dd class="col-sm-9">
                                {{ currency($user->currency) }}{{ formatAmount($grantApplication->amount) }}
                            </dd>

                            <dt class="col-sm-3">Status</dt>
                            <dd class="col-sm-9">
                                {{ $grantApplication->status }}
                            </dd>

                            <dt class="col-sm-3">Review Note</dt>
                            <dd class="col-sm-9">
                                {{ $grantApplication->review_notes ?? 'N/A' }}
                            </dd>

                            <dt class="col-sm-3">Submitted At</dt>
                            <dd class="col-sm-9">
                                {{ formatDateTime($grantApplication->submitted_at) }}
                            </dd>
                        @else
                            <dt class="col-sm-3">Amount</dt>
                            <dd class="col-sm-9">
                                {{ currency($user->currency) }}{{ formatAmount($grantApplication->amount) }}
                            </dd>

                            <dt class="col-sm-3">Grant Category & Description</dt>
                            <dd class="col-sm-9">
                                <ul class="list-unstyled">
                                    @foreach ($grantApplication->grantCategory as $key => $value)
                                        <li> {{ $value->name }} - {{ $value->description }}</li>
                                    @endforeach
                                </ul>
                            </dd>

                            <dt class="col-sm-3">Status</dt>
                            <dd class="col-sm-9">
                                {{ $grantApplication->status }}
                            </dd>

                            <dt class="col-sm-3">Submitted At</dt>
                            <dd class="col-sm-9">
                                {{ formatDateTime($grantApplication->submitted_at) }}
                            </dd>
                        @endif
                    </dl>

                </x-dashboard.admin.card>

                <x-dashboard.admin.card>
                    @slot('header')
                        Manage User Grant Application Status
                    @endslot

                    <form
                        action="{{ route('admin.user.grant_application.update', [$user->uuid, $grantApplication->uuid]) }}"
                        method="post">
                        @csrf
                        @method('PATCH')

                        <x-dashboard.admin.form-select name="status" id="grant_application_status" label="Status"
                            type="select" class="col-md-12 mb-3" value="{{ old('status', $grantApplication->status) }}"
                            :options="config('setting.grantApplicationStatues')"
                            formText="Please only update the status when needed to avoid multiple records and approved grant application" />

                        <x-dashboard.admin.submit-and-back-button
                            href="{{ route('admin.user.grant_application.index', $user->uuid) }}"
                            back="Back to Grant Applications" submit="Update Status" />
                    </form>
                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
