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
            <div class="col-md-12">
                @if ($user->kycIsRejected())
                    <x-dashboard.user.card>
                        <h3 class="card-title mb-0">Account Verification Required</h3>
                        <p>We could not approve your previous verification attempt. To comply with financial regulations and
                            to ensure the
                            security of your account, please provide accurate personal information and upload the required
                            documents again.
                            This will allow us to verify your identity and restore full access to your account.</p>
                    </x-dashboard.user.card>

                    @include('dashboard.user.partials.kyc_form')
                @elseif($user->kycIsPendingAndHasDocument())
                    <div class="alert alert-info mb-3" role="alert">
                        <strong>Verification in Progress</strong>
                        <p>Your verification documents have been successfully submitted and are currently under review.
                            Please allow some
                            time for processing. You will be notified once the review is complete.</p>
                    </div>
                @elseif($user->kycIsApproved())
                    <div class="alert alert-success mb-3" role="alert">
                        <strong>Account Verified</strong>
                        <p>Congratulations! Your account has been successfully verified. You now have full access to
                            all
                            available
                            features and services.</p>
                    </div>
                @else
                    <x-dashboard.user.card>
                        <h3 class="card-title mb-0">Account Information</h3>
                        <p>To comply with regulations, please provide your information to complete the verification
                            process.
                        </p>
                    </x-dashboard.user.card>

                    @include('dashboard.user.partials.kyc_form')
                @endif
            </div>
            <x-dashboard.user.support-card />
        </div>
    </div>
@endsection
