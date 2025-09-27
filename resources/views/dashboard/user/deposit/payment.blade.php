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
                        <h4>
                            <i class="ti ti-credit-card"></i> Payment Method: {{ $deposit->method }}
                        </h4>
                        <small>Secure payment processing for your deposit</small>

                        <div class="text-end">
                            Amount <br>
                            <span class="text-primary fs-18 fw-semibold">
                                {{ currency($deposit->user->currency) }}{{ formatAmount($deposit->amount) }}
                                {{ currency($deposit->user->currency, 'code') }}
                            </span>
                        </div>
                    @endslot
                    @php
                        $amount = currency($deposit->user->currency) . formatAmount($deposit->amount);
                    @endphp
                    @if ($deposit->isBitcoinMethod())
                        <x-dashboard.user.info-list title="Payment Instructions" :options="[
                            'You are to make payment of ' .
                            $amount .
                            ' using your selected payment method. Screenshot and upload the proof of payment.',
                        ]" />
                    @elseif($deposit->isCreditCardMethod())
                        <x-dashboard.user.info-list title="Payment Instructions" :options="['Enter your card details to make a deposit.']" />
                    @elseif($deposit->isPayPalMethod())
                        <x-dashboard.user.info-list title="Payment Instructions" :options="[
                            'Please proceed to send your payment using PayPal.',
                            'After completing your payment, kindly upload your proof of payment for review.',
                        ]" />
                    @elseif($deposit->isBankTransferMethod())
                        <x-dashboard.user.info-list title="Payment Instructions" :options="[
                            'Please proceed to make a bank transfer.',
                            'After transfer, kindly upload your proof of payment for approval.',
                        ]" />
                    @endif

                    @if ($deposit->isBitcoinMethod())
                        @include('dashboard.user.partials.bitcoin_payment')
                    @elseif($deposit->isCreditCardMethod())
                        @include('dashboard.user.partials.credit_card_payment')
                    @elseif($deposit->isPayPalMethod())
                        @include('dashboard.user.partials.paypal_payment')
                    @elseif($deposit->isBankTransferMethod())
                        @include('dashboard.user.partials.bank_transfer_payment')
                    @endif

                </x-dashboard.user.card>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(elementId) {
            const input = document.getElementById(elementId);
            navigator.clipboard.writeText(input.value).then(() => {
                alert('Bitcoin address copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy: ', err);
                alert('Failed to copy address. Please try again.');
            });
        }
    </script>
@endsection
