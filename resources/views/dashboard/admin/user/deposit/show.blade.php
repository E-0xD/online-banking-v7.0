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
                <div class="card">
                    <div class="card-body">
                        <!-- Invoice Logo-->
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div>

                            </div>
                            <div class="text-end">
                                <span class="{{ $deposit->status->badge() }}">{{ $deposit->status->label() }}</span>
                                <h3 class="m-0 fw-bolder fs-20">Deposit: #{{ $deposit->reference_id }}</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <h5 class="fw-bold fs-14">Deposit Date:</h5>
                                    <h6 class="fs-14 text-muted">{{ formatDateTime($deposit->created_at) }}</h6>
                                </div>
                            </div>

                            <div class="col-lg-6 text-end">
                                @if ($deposit->isBitcoinMethod())
                                    @if ($wallet->qr_code_path)
                                        <div class="bg-light border rounded-3 p-3 mb-3 d-flex justify-content-center">
                                            <img src="{{ asset($wallet->qr_code_path) }}" alt="Payment QR Code"
                                                class="img-fluid rounded" style="max-width: 11rem;">
                                        </div>
                                    @else
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ $wallet->address }}?amount={{ $deposit->amount }}"
                                            alt="Payment QR Code" class="img-fluid rounded" style="max-width: 11rem;">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="table-responsive">
                            <table class="table text-center table-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="bg-light bg-opacity-50">
                                        <th class="text-start border-0" scope="col">Deposit Details</th>
                                        <th class="text-end border-0" scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="products-list">
                                    <tr>
                                        <td class="text-start">
                                            <div class="d-flex align-items-center gap-2">
                                                @if ($deposit->isBitcoinMethod())
                                                    <i class="fa-brands fa-bitcoin fs-22"></i>
                                                @elseif ($deposit->isCreditCardMethod())
                                                    <i class="fa-brands fa-cc-visa fs-22"></i>
                                                @elseif($deposit->isPayPalMethod())
                                                    <i class="fa-brands fa-paypal fs-22"></i>
                                                @elseif($deposit->isBankTransferMethod())
                                                    <i class="fa-solid fa-bank fs-22"></i>
                                                @endif
                                                <div>
                                                    <span class="fw-medium">{{ ucfirst($deposit->method) }} Deposit</span>
                                                    <p class="text-muted mb-0">
                                                        @if ($deposit->isBitcoinMethod())
                                                            Bitcoin Address: {{ $wallet->address ?? 'N/A' }}<br>
                                                            @if ($deposit->proof)
                                                                Proof: <a href="{{ asset($deposit->proof) }}"
                                                                    target="_blank">View</a>
                                                            @else
                                                                Proof: N/A
                                                            @endif
                                                        @elseif($deposit->isCreditCardMethod())
                                                            Card Number: **** **** ****
                                                            {{ substr($deposit->card_number ?? '', -4) }}<br>
                                                            Expiry: {{ $deposit->card_expiry_date ?? 'N/A' }}
                                                        @elseif($deposit->isPayPalMethod())
                                                            PayPal Email: {{ $setting->paypal_email ?? 'N/A' }} <br>
                                                            @if ($deposit->proof)
                                                                Proof: <a href="{{ asset($deposit->proof) }}"
                                                                    target="_blank">View</a>
                                                            @else
                                                                Proof: N/A
                                                            @endif
                                                        @elseif($deposit->isBankTransferMethod())
                                                            Bank Name: {{ $setting->bank_name ?? 'N/A' }}<br>
                                                            Account Number: {{ $setting->account_number ?? 'N/A' }}<br>
                                                            Account Name: {{ $setting->account_name ?? 'N/A' }} <br>
                                                            @if ($setting->routing_number)
                                                                Routing Number: {{ $setting->routing_number ?? 'N/A' }}
                                                                <br>
                                                            @endif
                                                            @if ($setting->bank_swift_code)
                                                                Swift Code: {{ $setting->bank_swift_code ?? 'N/A' }}
                                                                <br>
                                                            @endif
                                                            @if ($setting->bank_iban)
                                                                Iban Number: {{ $setting->bank_iban ?? 'N/A' }} <br>
                                                            @endif
                                                            @if ($deposit->proof)
                                                                Proof: <a href="{{ asset($deposit->proof) }}"
                                                                    target="_blank">View</a>
                                                            @else
                                                                Proof: N/A
                                                            @endif
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            {{ currency($deposit->user->currency) }}{{ formatAmount($deposit->amount) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table><!--end table-->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="bg-body rounded-2 mt-4">
                            @if ($deposit->isBitcoinMethod() && $deposit->isPending())
                                <p class="mb-0"><span class="fs-12 fw-bold text-uppercase">Note:</span>
                                    Please ensure the Bitcoin payment is sent to the provided wallet address. Verification
                                    may take up to 1-3 hours after the transaction is confirmed on the blockchain.
                                </p>
                            @elseif($deposit->isCreditCardMethod() && $deposit->isPending())
                                <p class="mb-0"><span class="fs-12 fw-bold text-uppercase">Note:</span>
                                    The card payment is pending verification. Once confirmed, the deposit will be credited
                                    to your account within 1-2 business days.
                                </p>
                            @elseif($deposit->isPayPalMethod() && $deposit->isPending())
                                <p class="mb-0"><span class="fs-12 fw-bold text-uppercase">Note:</span>
                                    The PayPal payment is pending verification. Once confirmed, the deposit will be
                                    credited to your account within 1-2 business days.
                                </p>
                            @elseif($deposit->isBankTransferMethod() && $deposit->isPending())
                                <p class="mb-0"><span class="fs-12 fw-bold text-uppercase">Note:</span>
                                    The bank transfer is pending verification. Once confirmed, the deposit will be
                                    credited to your account within 1-2 business days.
                                </p>
                            @endif
                        </div>

                        @if ($deposit->isPending())
                            <div class="mt-4">
                                <p class="mb-2 pb-2"><b>Thank you for your deposit!</b> We appreciate your trust in us and
                                    will
                                    process your request promptly.</p>
                            </div>
                        @endif

                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('admin.user.deposit.index', $user->uuid) }}" class="btn btn-primary"> <i
                                    class="ti ti-arrow-left me-1"></i> Back</a>
                        </div>
                    </div>

                    <div class="card-footer">
                        @if ($deposit->isPending())
                            <form action="{{ route('admin.user.deposit.update', [$user->uuid, $deposit->uuid]) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" name="status" value="approved" class="btn btn-success m-1"> <i
                                        class="ti ti-check me-1"></i> Approve</button>
                                <button type="submit" name="status" value="rejected" class="btn btn-danger m-1"> <i
                                        class="ti ti-x me-1"></i> Reject</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
