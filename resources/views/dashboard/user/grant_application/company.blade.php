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
                        Apply as Company
                    @endslot

                    <p>
                        Please provide the following information about your organization:
                    </p>

                    <form action="{{ route('user.grant_application.company_submit') }}" method="post">
                        @csrf

                        <div class="row">
                            <x-dashboard.user.form-input name="name" label="Legal Name Of Organization *"
                                class="col-md-6 mb-3" />

                            <x-dashboard.user.form-input name="tax_id" label="Tax ID / EN *" class="col-md-6 mb-3"
                                formText="Format: XX-XXXXXXX" />

                            <x-dashboard.user.form-select name="organization_type" label="Organization Type"
                                class="col-md-6 mb-3" type="select" :options="config('setting.organizationTypes')" />

                            <x-dashboard.user.form-input name="founding_year" label="Founding Year *" class="col-md-6 mb-3"
                                value="{{ old('founding_year', date('Y')) }}" />

                            <x-dashboard.user.form-input name="full_mailing_address" label="Full Mailing Address *"
                                class="col-md-12 mb-3" type="textarea" />

                            <x-dashboard.user.form-input name="contact_phone" label="Contact Phone *"
                                placeholder="(xxx) xxx-xxxx" class="col-md-6 mb-3" />

                            <x-dashboard.user.form-input name="contact_person" label="Contact Person *"
                                class="col-md-6 mb-3" />

                            <x-dashboard.user.form-input name="mission_statement" label="Mission Statement *"
                                class="col-md-12 mb-3" type="textarea"
                                formText="Describe your organization's core mission and purpose" />

                            <x-dashboard.user.form-input name="date_of_incorporation" label="Date of Incorporation *"
                                class="col-md-12 mb-3" type="date" />

                            <x-dashboard.user.form-input name="project_title" label="Project Title *" class="col-md-12 mb-3"
                                formText="A concise title for your grant-funded project" />

                            <x-dashboard.user.form-input name="project_description" label="Project Description *"
                                class="col-md-12 mb-3" type="textarea"
                                formText="Detailed description of the project for which funding is requested" />

                            <x-dashboard.user.form-input name="expected_outcome" label="Expected Outcome *"
                                class="col-md-12 mb-3" type="textarea"
                                formText="Describe the specific goals and measurable outcomes you expect to achieve" />

                            <x-dashboard.user.form-input name="amount"
                                label="Request Amount ({{ currency($user->currency) }})" type="number"
                                class="col-md-12 mb-3" formText="Enter the amount you would like to request for your grant"
                                value="{{ old('amount', 50000) }}" />

                            <x-dashboard.user.info-list title="Important Information" :options="[
                                'By submitting this application, you acknowledge that the final approved amount will be determined during our review process based on your eligibility and requested amount. You\'ll receive notification once your application has been processed.',
                            ]" />

                            <x-dashboard.user.submit-and-back-button href="{{ route('user.grant_application.index') }}"
                                submit="Submit Application" />

                        </div>
                    </form>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
