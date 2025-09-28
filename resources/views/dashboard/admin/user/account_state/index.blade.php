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
            <div class="col-md-12">

                <x-dashboard.admin.card>
                    @slot('header')
                        User {{ $title }} Management
                    @endslot

                    <form action="{{ route('admin.user.account_state.store', $user->uuid) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <x-dashboard.admin.form-select name="account_state" id="account_state" label="Account State"
                            class="col-md-12 mb-3" value="{{ old('account_state', $user->account_state) }}" type="select"
                            :options="config('setting.accountStates')" formText="Description: {{ $user->account_state->description() }}" />

                        <x-dashboard.admin.form-input name="account_state_message"
                            value="{{ old('account_state_message', $user->account_state_message) }}" type="textarea"
                            label="Account State Message" class="col-md-12 mb-3" />

                        <x-dashboard.admin.submit-and-back-button href="{{ route('admin.user.show', $user->uuid) }}"
                            back="Back to User" submit="Save" />
                    </form>

                </x-dashboard.admin.card>

            </div>

            <div class="col-md-12">
                <x-dashboard.admin.card>
                    @slot('header')
                        Account States Explanation
                    @endslot

                    <h4>Active</h4>
                    <ul>
                        <li><strong>Description:</strong> The account is fully operational.</li>
                        <li><strong>User Can:</strong> Log in, deposit, withdraw, transfer, and perform all banking
                            activities.
                        </li>
                        <li><strong>Admin Can:</strong> Monitor activity, freeze, suspend, or mark dormant if inactive.</li>
                    </ul>

                    <h4>Dormant</h4>
                    <ul>
                        <li><strong>Description:</strong> The account has been inactive for a set period.</li>
                        <li><strong>User Can:</strong> Log in and view account details, but cannot make withdrawals or
                            transfers
                            until reactivated.</li>
                        <li><strong>Admin Can:</strong> Reactivate the account after due process or verification.</li>
                    </ul>

                    <h4>Restricted</h4>
                    <ul>
                        <li><strong>Description:</strong> The account has limited access, often due to incomplete
                            documentation,
                            suspicious activity, or policy flags.</li>
                        <li><strong>User Can:</strong> Log in and view balance/history.</li>
                        <li><strong>User Cannot:</strong> Withdraw or transfer funds.</li>
                        <li><strong>Admin Can:</strong> Remove restriction after verification or escalate to
                            frozen/suspended if
                            needed.</li>
                    </ul>

                    <h4>Frozen</h4>
                    <ul>
                        <li><strong>Description:</strong> The account is temporarily locked due to investigations,
                            compliance
                            checks, or suspicious activity.</li>
                        <li><strong>User Can:</strong> Log in and view balance/history.</li>
                        <li><strong>User Cannot:</strong> Deposit, withdraw, or transfer.</li>
                        <li><strong>Admin Can:</strong> Unfreeze after resolution or escalate to suspension/closure.</li>
                    </ul>

                    <h4>Closed</h4>
                    <ul>
                        <li><strong>Description:</strong> The account has been permanently shut down.</li>
                        <li><strong>User Cannot:</strong> Log in or perform any actions.</li>
                        <li><strong>Admin Can:</strong> Reopen only under exceptional conditions (if policy allows).</li>
                    </ul>

                    <h4>Pending Verification</h4>
                    <ul>
                        <li><strong>Description:</strong> The account has been created but is awaiting KYC/identity
                            verification.</li>
                        <li><strong>User Can:</strong> Log in and view profile but cannot perform financial transactions.
                        </li>
                        <li><strong>Admin Can:</strong> Approve/reject verification or keep the account restricted until
                            documents are received.</li>
                    </ul>

                    <h4>Suspended</h4>
                    <ul>
                        <li><strong>Description:</strong> The account has been suspended due to policy violations,
                            regulatory
                            issues, or fraud detection.</li>
                        <li><strong>User Cannot:</strong> Log in or access account.</li>
                        <li><strong>Admin Can:</strong> Reinstate account after resolution or permanently close it.</li>
                    </ul>

                </x-dashboard.admin.card>
            </div>

            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
