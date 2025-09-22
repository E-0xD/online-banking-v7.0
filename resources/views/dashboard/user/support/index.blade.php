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
                    <h3>Support Center</h3>
                    <p>Get help with your account and services</p>
                </x-dashboard.user.card>

                <form action="{{ route('user.support.store') }}" method="post">
                    @csrf
                    <x-dashboard.user.card>
                        @slot('header')
                            <h4>Submit a Support Ticket</h4>
                            <p>We're here to help. Tell us about your issue and we'll find a solution.</p>
                        @endslot

                        {{-- Body --}}
                        <x-dashboard.user.form-input name="title" label="Ticket Title" value="{{ old('title') }}"
                            formText="Be specific to help us understand your issue" class="col-md-12 mb-3" />

                        <x-dashboard.user.form-select name="priority" label="Priority Level" type="select"
                            value="{{ old('priority') }}" formText="Select based on urgency of your request"
                            class="col-md-12 mb-3" :options="config('setting.priorities')" />

                        <x-dashboard.user.form-input name="description" label="Describe Your Issue" type="textarea"
                            value="{{ old('description') }}"
                            formText="Include any relevant details that might help us resolve your issue"
                            class="col-md-12 mb-3" />

                        <x-dashboard.user.info-list title="Support Information" :options="[
                            'Our support team typically responds within 24 hours. For urgent matters please select High Priority and we\'ll do our best to assist you sooner.',
                        ]" />

                        <x-dashboard.user.form-button name="Submit Ticket" icon="fa-solid fa-paper-plane me-1"
                            class="btn btn-primary w-100" />

                        {{-- Body End --}}

                    </x-dashboard.user.card>

                    <div class="card border-0">
                        <!-- Header -->
                        <div class="card-header bg-primary bg-gradient text-white d-flex align-items-center">
                            <div class="bg-white rounded d-flex align-items-center justify-content-center me-3"
                                style="width:32px; height:32px;">
                                <i class="fa-solid fa-question text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Quick Help</h5>
                                <small class="text-light">Find answers to common questions</small>
                            </div>
                        </div>

                        <!-- FAQ Items -->
                        <div class="accordion accordion-flush" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq1">
                                        <i class="fa-solid fa-paper-plane me-1 text-secondary"></i> How to make a transfer?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body small">
                                        Go to Transfer section and select Local or International transfer. Enter recipient
                                        details, amount, and confirm with your PIN.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq2">
                                        <i class="fa-solid fa-credit-card me-1 text-secondary"></i> How to apply for a card?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body small">
                                        Visit Cards section and click Apply for Virtual Card. Fill out the application form
                                        and wait for approval.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq3">
                                        <i class="fa-solid fa-wallet me-1 text-secondary"></i> How to check my balance?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body small">
                                        Your balance is displayed on the main dashboard. You can toggle visibility using the
                                        eye icon.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq4">
                                        <i class="fa-solid fa-shield me-1 text-secondary"></i> How to enable 2FA?
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body small">
                                        Go to Settings &gt; Security &gt; Two-Factor Authentication and follow the setup
                                        instructions.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq5">
                                        <i class="fa-solid fa-plus me-1 text-secondary"></i> How to deposit funds?
                                    </button>
                                </h2>
                                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body small">
                                        Click on Deposit from the dashboard, select your preferred payment method, and
                                        follow the instructions.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq6">
                                        <i class="fa-solid fa-chart-line me-1 text-secondary"></i> How to track
                                        transactions?
                                    </button>
                                </h2>
                                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body small">
                                        Visit the Transactions page to view your complete transaction history with filters
                                        and search options.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Footer -->
                        <div class="card-footer bg-light text-center">
                            <p class="small text-muted mb-3">Still need help?</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div>
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1"
                                        style="width:32px;height:32px;">
                                        <i class="fa-solid fa-clock text-primary"></i>
                                    </div>
                                    <small class="fw-semibold text-muted">24/7 Support</small>
                                </div>
                                <div>
                                    <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1"
                                        style="width:32px;height:32px;">
                                        <i class="fa-solid fa-headset text-success"></i>
                                    </div>
                                    <small class="fw-semibold text-muted">Live Chat</small>
                                </div>
                                <div>
                                    <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1"
                                        style="width:32px;height:32px;">
                                        <i class="fa-solid fa-bolt text-info"></i>
                                    </div>
                                    <small class="fw-semibold text-muted">Fast Response</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
