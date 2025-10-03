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
                    <div class="container-fluid">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h3 class="fw-bold"><i class="fa-solid fa-credit-card me-2 text-primary"></i> Card Details
                                </h3>
                                <p class="text-muted mb-0">Detailed information about your virtual card</p>
                            </div>
                            <a href="{{ route('admin.user.card.index', $user->uuid) }}"
                                class="btn btn-outline-secondary btn-sm">
                                <i class="fa-solid fa-arrow-left me-1"></i> Back to Cards
                            </a>
                        </div>

                        <!-- Card Summary -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <div class="row g-4 align-items-center">
                                    <div class="col-md-8">
                                        <h4 class="fw-bold mb-1">{{ $card->card_type }} • {{ $card->card_level }}</h4>
                                        <p class="mb-2 text-muted">
                                            Reference ID: <span
                                                class="fw-bold">#{{ $card->reference_id ?? $card->id }}</span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="{{ $card->status->badge() }}">
                                                {{ $card->status->label() }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-md-4 text-md-end">
                                        <div class="bg-light p-3 rounded text-center">
                                            <div class="fw-bold fs-5">{{ $card->card_number }}
                                            </div>
                                            <small class="text-muted">Expires
                                                {{ formatDate($card->expiry_date) ?? 'N/A' }}</small>
                                            <br>
                                            <small class="text-muted">CVV: {{ $card->cvv ?? '***' }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Information -->
                        <div class="row g-4">
                            <!-- Card Details -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0 fw-bold"><i class="fa-solid fa-id-card me-2 text-primary"></i> Card
                                            Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Type:</strong> {{ $card->card_type }}</p>
                                        <p><strong>Level:</strong> {{ $card->card_level }}</p>
                                        <p><strong>Currency:</strong> {{ cardCurrency($card->currency, 'name') }}</p>
                                        <p><strong>Daily Limit:</strong>
                                            {{ cardCurrency($card->currency) }}{{ formatAmount($card->daily_limit) }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Billing Information -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0 fw-bold"><i class="fa-solid fa-file-invoice me-2 text-primary"></i>
                                            Billing Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Cardholder:</strong> {{ $card->card_holder_name }}</p>
                                        <p><strong>Address:</strong> {{ $card->billing_address }}</p>
                                        <p><strong>City:</strong> {{ $card->city ?? '-' }}</p>
                                        <p><strong>ZIP / Postal Code:</strong> {{ $card->zip ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    @if ($card->isPending())
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('admin.user.card.approved', [$user->uuid, $card->uuid]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')

                                <button type="submit" name="status" value="active" class="btn btn-success btn-sm me-2">
                                    <i class="fa-solid fa-check me-1"></i> Approve
                                </button>
                            </form>
                            <form action="{{ route('admin.user.card.rejected', [$user->uuid, $card->uuid]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')

                                <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm me-2">
                                    <i class="fa-solid fa-ban me-1"></i> Reject
                                </button>
                            </form>
                        </div>
                    @endif

                    @if ($card->isActive())
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('admin.user.card.blocked', [$user->uuid, $card->uuid]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')

                                <button type="submit" name="status" value="blocked" class="btn btn-danger btn-sm me-2">
                                    <i class="fa-solid fa-ban me-1"></i> Block
                                </button>
                            </form>
                        </div>
                    @elseif($card->isBlocked())
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('admin.user.card.unblocked', [$user->uuid, $card->uuid]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')

                                <button type="submit" name="status" value="active" class="btn btn-success btn-sm me-2">
                                    <i class="fa-solid fa-check me-1"></i> Unblock
                                </button>
                            </form>
                        </div>
                    @endif

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
