@extends('dashboard.user.layouts.app')
@section('content')
    @push('styles')
        <style>
            .section-box {
                /* background: #fff; */
                border-radius: 10px;
                padding: 25px;
                margin-bottom: 25px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            }

            .loan-type-box {
                /* background: #f9fcff; */
                border: 1px solid #e0e6f1;
                border-radius: 8px;
                padding: 18px;
                text-align: left;
                margin-bottom: 15px;
                transition: 0.3s;
            }

            .loan-type-box:hover {
                /* background: #eef6ff; */
            }

            .how-it-works-step {
                /* background: #eef6ff; */
                border-radius: 50%;
                width: 32px;
                height: 32px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                color: #007bff;
                margin-right: 10px;
            }

            .cta-section {
                /* background: #f0f7ff; */
                border-radius: 10px;
                padding: 25px;
                text-align: center;
                margin-top: 20px;
            }
        </style>
    @endpush
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
                    @if ($user->loan()->count() > 0)
                        @slot('header')
                            <div class="float-end">
                                <a href="{{ route('user.loan.history') }}" class="btn btn-primary btn-sm"><i
                                        class="fa-solid fa-history me-1"></i> Loan History
                                </a>
                            </div>
                        @endslot
                    @endif
                    <!-- Why Choose Us -->
                    <div class="section-box">
                        <h5 class="mb-4">💡 Why Choose Our Loan Services</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div><strong>Quick Approval</strong><br><small>Get a decision within hours and funds within
                                        days</small></div>
                            </div>
                            <div class="col-md-6">
                                <div><strong>Competitive Rates</strong><br><small>Low interest rates tailored to your credit
                                        profile</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div><strong>Simple Process</strong><br><small>Straightforward application with minimal
                                        paperwork</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div><strong>Secure & Confidential</strong><br><small>Your information is protected with
                                        bank-level
                                        security</small></div>
                            </div>
                        </div>
                    </div>

                    <!-- Available Loan Types -->
                    <div class="section-box">
                        <h5 class="mb-4">📌 Available Loan Types</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="loan-type-box">
                                    <strong>🏠 Personal Home Loans</strong>
                                    <p class="mb-0">Finance your dream home with competitive rates</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="loan-type-box">
                                    <strong>🚗 Automobile Loans</strong>
                                    <p class="mb-0">Get on the road with flexible auto financing</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="loan-type-box">
                                    <strong>💼 Business Loans</strong>
                                    <p class="mb-0">Grow your business with tailored financing solutions</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="loan-type-box">
                                    <strong>👥 Joint Mortgage</strong>
                                    <p class="mb-0">Share responsibility with a co-borrower</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="loan-type-box">
                                    <strong>💳 Secured Overdraft</strong>
                                    <p class="mb-0">Access funds when needed with asset backing</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="loan-type-box">
                                    <strong>❤️ Health Finance</strong>
                                    <p class="mb-0">Cover medical expenses with flexible payment options</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- How It Works -->
                    <div class="section-box">
                        <h5 class="mb-4">ℹ️ How It Works</h5>
                        <div class="d-flex mb-3">
                            <div class="how-it-works-step">1</div>
                            <div>
                                <strong>Apply Online</strong><br>
                                <small>Complete our simple online application form with your details and loan
                                    requirements</small>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="how-it-works-step">2</div>
                            <div>
                                <strong>Quick Review</strong><br>
                                <small>Our team reviews your application and may contact you for additional
                                    information</small>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="how-it-works-step">3</div>
                            <div>
                                <strong>Approval & Disbursement</strong><br>
                                <small>Once approved, the loan amount will be transferred to your account</small>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="cta-section">
                        <h5 class="mb-2">Ready to get started?</h5>
                        <p class="mb-3">Apply now and get a decision on your loan application quickly</p>
                        <a href="{{ route('user.loan.form') }}" class="btn btn-primary px-4">✍ Apply for a Loan</a>
                    </div>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
