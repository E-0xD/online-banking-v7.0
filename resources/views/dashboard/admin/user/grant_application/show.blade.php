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
                <x-dashboard.available_balance :user="$user" />
                
                <x-dashboard.admin.card>
                    @slot('header')
                        User {{ $title }}
                    @endslot

                    <dl class="row">
                        @if ($grantApplication->isTypeCompany())
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
                                <span class="{{ $grantApplication->status->badge() }}">
                                    {{ $grantApplication->status->label() }}
                                </span>
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
                                <span class="{{ $grantApplication->status->badge() }}">
                                    {{ $grantApplication->status->label() }}
                                </span>
                            </dd>

                            @if ($grantApplication->review_notes)
                                <dt class="col-sm-3">Review Note</dt>
                                <dd class="col-sm-9">
                                    {{ $grantApplication->review_notes ?? 'N/A' }}
                                </dd>
                            @endif

                            <dt class="col-sm-3">Submitted At</dt>
                            <dd class="col-sm-9">
                                {{ formatDateTime($grantApplication->submitted_at) }}
                            </dd>
                        @endif
                    </dl>

                </x-dashboard.admin.card>

                @if ($grantApplication->isPending())
                    <x-dashboard.admin.card>
                        <div class="mb-3">
                            <form
                                action="{{ route('admin.user.grant_application.update', [$user->uuid, $grantApplication->uuid]) }}"
                                method="post">
                                @csrf
                                @method('PATCH')

                                <button type="submit" name="status" value="Approved" class="btn btn-success"> <i
                                        class="ti ti-check me-1"></i>
                                    Approve</button>
                            </form>

                        </div>
                        <div class="mb-3">
                            <form
                                action="{{ route('admin.user.grant_application.update', [$user->uuid, $grantApplication->uuid]) }}"
                                method="post">
                                @csrf
                                @method('PATCH')

                                <x-dashboard.admin.form-input name="review_notes" label="Review Notes" type="textarea"
                                    class="col-md-12 mb-3"
                                    value="{{ old('review_notes', $grantApplication->review_notes) }}"
                                    placeholder="Write rejection reason" />

                                <button type="submit" name="status" value="Rejected" class="btn btn-danger"> <i
                                        class="fa-solid fa-times me-1"></i>
                                    Reject</button>
                            </form>
                        </div>
                    </x-dashboard.admin.card>
                @endif
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
