@extends('dashboard.user.layouts.app')
@section('content')
    @push('styles')
        <style>
            /* Banner Card Custom Colors */
            .banner-card {
                background-color: #232E51;
                /* Light Mode */
                color: #ffffff;
            }

            body.dark-mode .banner-card {
                background-color: #1E1F27;
                /* Dark Mode */
            }
        </style>

        <style>
            .card-wrapper {
                perspective: 1000px;
                width: 100%;
                max-width: 350px;
                /* prevent it from getting too big */
                aspect-ratio: 16/9;
                /* keep card proportion */
                margin: 20px auto;
            }

            .card-inner {
                position: relative;
                width: 100%;
                height: 100%;
                transition: transform 0.8s;
                transform-style: preserve-3d;
            }

            .card-wrapper:hover .card-inner {
                transform: rotateY(180deg);
            }

            .card-front,
            .card-back {
                position: absolute;
                width: 100%;
                height: 100%;
                border-radius: 15px;
                backface-visibility: hidden;
                color: white;
                padding: 5%;
                /* percentage padding to stay proportional */
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            /* Themes */
            .theme-blue {
                background: linear-gradient(135deg, #1e3c72, #2a5298);
            }

            .theme-purple {
                background: linear-gradient(135deg, #6a11cb, #2575fc);
            }

            .theme-green {
                background: linear-gradient(135deg, #11998e, #38ef7d);
            }

            .card-front .brand {
                font-size: clamp(16px, 2vw, 24px);
                font-weight: bold;
                text-align: right;
            }

            .card-front .number {
                font-size: clamp(14px, 1.5vw, 20px);
                letter-spacing: 3px;
            }

            .card-front .holder {
                font-size: clamp(10px, 1vw, 14px);
                text-transform: uppercase;
            }

            .card-back {
                transform: rotateY(180deg);
            }

            .magnetic-strip {
                background: #000;
                height: 20%;
                margin-bottom: 5%;
                border-radius: 5px;
            }

            .cvv-box {
                background: #fff;
                color: #000;
                width: 30%;
                text-align: center;
                border-radius: 5px;
                font-weight: bold;
                padding: 5px;
                margin-left: auto;
            }

            /* Make cards stack properly on small devices */
            @media (max-width: 768px) {
                .card-wrapper {
                    max-width: 100%;
                    aspect-ratio: 16/10;
                    /* taller ratio for mobile */
                }
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

                    @slot('header')
                        <h3>Virtual Cards</h3>
                        <p>Secure virtual cards for online payments and subscriptions</p>
                    @endslot

                    <div class="container-fluid">

                        <!-- Stats Row -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <div class="card shadow-sm border">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="text-muted mb-1">ACTIVE CARDS</h6>
                                            <h4 class="mb-0 fw-bold">{{ $user->card()->where('status', 'active')->count() }}
                                            </h4>
                                        </div>
                                        <div class="icon bg-primary bg-opacity-10 text-primary p-3 rounded">
                                            <i class="fa-solid fa-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('user.card.history') }}">
                                    <div class="card shadow-sm border">
                                        <div class="card-body d-flex align-items-center justify-content-between">
                                            <div>
                                                <h6 class="text-muted mb-1">PENDING APPLICATIONS</h6>
                                                <h4 class="mb-0 fw-bold">
                                                    {{ $user->card()->where('status', 'pending')->count() }}</h4>
                                            </div>
                                            <div class="icon bg-warning bg-opacity-10 text-warning p-3 rounded">
                                                <i class="fa-solid fa-hourglass-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <div class="card shadow-sm border">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="text-muted mb-1">TOTAL BALANCE</h6>
                                            <h4 class="mb-0 fw-bold">
                                                {{ currency($user->currency) }}{{ formatAmount($user->account_balance) }}
                                            </h4>
                                        </div>
                                        <div class="icon bg-success bg-opacity-10 text-success p-3 rounded">
                                            <i class="fa-solid fa-wallet"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Banner -->
                        <div class="card shadow-sm border mb-4">
                            <div class="card-body banner-card rounded p-4">
                                <h3 class="fw-bold">Virtual Cards Made Easy</h3>
                                <p class="mb-4">Create virtual cards for secure online payments, subscription management,
                                    and more.
                                    Enhanced security and spending control.</p>
                                <div class="d-flex gap-4 flex-wrap">
                                    <div><i class="fa-solid fa-shield-halved me-2"></i>Secure<br><small>Protected
                                            payments</small></div>
                                    <div><i class="fa-solid fa-globe me-2"></i>Global<br><small>Worldwide acceptance</small>
                                    </div>
                                    <div><i class="fa-solid fa-sliders me-2"></i>Control<br><small>Spending limits</small>
                                    </div>
                                    <div><i class="fa-solid fa-bolt me-2"></i>Instant<br><small>Quick issuance</small></div>
                                </div>
                            </div>
                        </div>

                        <!-- Your Cards -->
                        <div class="card shadow-sm border">
                            <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                                <h5 class="mb-0">Your Cards</h5>
                                <a href="{{ route('user.card.create') }}" class="text-decoration-none">+ New Card</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @forelse ($cards as $key => $card)
                                        @if ($card->isTypeVisa())
                                            <!-- Example Card -->
                                            <div class="col-sm-12 col-md-6 col-lg-4">
                                                <div class="card-wrapper">
                                                    <div class="card-inner">
                                                        <!-- Front -->
                                                        <div class="card-front theme-blue">
                                                            <div class="brand">VISA</div>
                                                            <div class="number">**** **** ****
                                                                {{ substr($card->card_number, -4) }}</div>
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <div class="holder">{{ $card->card_holder_name }}
                                                                    </div>
                                                                    <div class="expiry">
                                                                        {{ cardExpiryDateFormat($card->expiry_date) }}
                                                                    </div>
                                                                </div>
                                                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png"
                                                                    alt="visa" width="60">
                                                            </div>
                                                        </div>
                                                        <!-- Back -->
                                                        <div class="card-back theme-blue">
                                                            <div class="magnetic-strip"></div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <span></span>
                                                                <div class="cvv-box">{{ $card->cvv }}</div>
                                                            </div>
                                                            <div class="text-end small">Authorized Signature</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('user.card.show', $card->uuid) }}">View Details</a>
                                            </div>
                                        @elseif($card->isTypeMastercard())
                                            <!-- Another Card -->
                                            <div class="col-sm-12 col-md-6 col-lg-4">
                                                <div class="card-wrapper">
                                                    <div class="card-inner">
                                                        <!-- Front -->
                                                        <div class="card-front theme-purple">
                                                            <div class="brand">MasterCard</div>
                                                            <div class="number">**** **** ****
                                                                {{ substr($card->card_number, -4) }}</div>
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <div class="holder">{{ $card->card_holder_name }}
                                                                    </div>
                                                                    <div class="expiry">
                                                                        {{ cardExpiryDateFormat($card->expiry_date) }}
                                                                    </div>
                                                                </div>
                                                                <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Mastercard-logo.png"
                                                                    alt="mc" width="60">
                                                            </div>
                                                        </div>
                                                        <!-- Back -->
                                                        <div class="card-back theme-purple">
                                                            <div class="magnetic-strip"></div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <span></span>
                                                                <div class="cvv-box">{{ $card->cvv }}</div>
                                                            </div>
                                                            <div class="text-end small">Authorized Signature</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('user.card.show', $card->uuid) }}">View Details</a>
                                            </div>
                                        @elseif($card->isTypeAmex())
                                            <!-- Another Card -->
                                            <div class="col-sm-12 col-md-6 col-lg-4">
                                                <div class="card-wrapper">
                                                    <div class="card-inner">
                                                        <!-- Front -->
                                                        <div class="card-front theme-green">
                                                            <div class="brand">American Express</div>
                                                            <div class="number">**** **** ****
                                                                {{ substr($card->card_number, -4) }}</div>
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <div class="holder">{{ $card->card_holder_name }}
                                                                    </div>
                                                                    <div class="expiry">
                                                                        {{ cardExpiryDateFormat($card->expiry_date) }}
                                                                    </div>
                                                                </div>
                                                                <img src="{{ asset('assets/images/amex.png') }}"
                                                                    alt="amex" width="60">
                                                            </div>
                                                        </div>
                                                        <!-- Back -->
                                                        <div class="card-back theme-green">
                                                            <div class="magnetic-strip"></div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <span></span>
                                                                <div class="cvv-box">{{ $card->cvv }}</div>
                                                            </div>
                                                            <div class="text-end small">Authorized Signature</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('user.card.show', $card->uuid) }}">View Details</a>
                                            </div>
                                        @endif
                                    @empty
                                        <div class="text-center p-5">
                                            <div class="mb-3">
                                                <i class="fa-solid fa-credit-card fa-3x text-primary"></i>
                                            </div>
                                            <h5 class="fw-bold">No Cards Yet</h5>
                                            <p class="text-muted">Get started by applying for your first virtual card. It
                                                only
                                                takes
                                                a
                                                few minutes!
                                            </p>
                                            <a href="{{ route('user.card.create') }}" class="btn btn-primary btn-lg">
                                                <i class="fa-solid fa-plus-circle me-1"></i> Apply for Your First Card
                                            </a>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>

                    </div>
                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
