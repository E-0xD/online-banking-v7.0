@extends('dashboard.user.layouts.app')
@section('content')
    <style>
        .processing-card {
            max-width: 600px;
            margin: 60px auto;
        }

        .progress-bar {
            background-color: #0d6efd;
            transition: width 0.6s ease;
        }

        .step-list li {
            margin-bottom: 12px;
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .amount-section {
            display: none;
            opacity: 0;
            transition: opacity 1s ease;
        }

        .amount {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .amount-approved {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
        }
    </style>

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
                        {{ $title }}
                    @endslot

                    <div class="container text-center">
                        <h3 class="mt-5 fw-bold">Processing Your Application</h3>
                        <p class="text-muted">
                            We're calculating your grant eligibility and pre-approved amount.
                            Please wait while our system processes your information.
                        </p>

                        <div class="card processing-card p-4">
                            <div class="text-center mb-3">
                                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width:50px; height:50px;">
                                    <i class="fa-solid fa-calculator fs-4"></i>
                                </div>
                                <h5 class="mt-3">Application Processing</h5>
                            </div>

                            <!-- Progress -->
                            <div class="progress mb-4" style="height: 6px;">
                                <div id="progress-bar" class="progress-bar" style="width: 0%;"></div>
                            </div>

                            <!-- Steps -->
                            <ul class="list-unstyled step-list text-start" id="step-list">
                                <li><i class="fa-solid fa-circle-check text-success"></i> Verifying account information</li>
                                <li><i class="fa-solid fa-circle-check text-success"></i> Analyzing application details</li>
                                <li><i class="fa-solid fa-circle-check text-success"></i> Reviewing eligibility criteria
                                </li>
                                <li><i class="fa-solid fa-circle-check text-success"></i> Calculating pre-approved amount
                                </li>
                                <li><i class="fa-solid fa-circle-check text-success"></i> Finalizing results</li>
                            </ul>

                            <!-- Amounts -->
                            <div class="mt-4 amount-section" id="amount-section">
                                <p class="mb-1">You Requested</p>
                                <p class="amount text-dark">
                                    {{ currency($user->currency) }}{{ formatAmount($grantApplication->amount) }}</p>
                                <p class="mb-1">Pre-Approved Amount</p>
                                <p class="amount-approved">{{ currency($user->currency) }}{{ formatAmount(0) }}</p>

                                <!-- Button -->
                                <div class="mt-3">
                                    <a href="{{ route('user.grant_application.result', $grantApplication->uuid) }}"
                                        class="btn btn-primary">View Application Results <i
                                            class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const steps = document.querySelectorAll("#step-list li");
            const progressBar = document.getElementById("progress-bar");
            const amountSection = document.getElementById("amount-section");

            let currentStep = 0;
            let progress = 0;
            const totalSteps = steps.length;
            const stepDuration = 1000; // 1 second per step

            function showNextStep() {
                if (currentStep < totalSteps) {
                    steps[currentStep].style.opacity = "1";
                    progress += 100 / totalSteps;
                    progressBar.style.width = progress + "%";
                    currentStep++;
                    setTimeout(showNextStep, stepDuration);
                } else {
                    // Show amount section
                    setTimeout(() => {
                        amountSection.style.display = "block";
                        setTimeout(() => {
                            amountSection.style.opacity = "1";
                        }, 50);
                    }, 500);
                }
            }

            showNextStep();
        });
    </script>
@endsection
