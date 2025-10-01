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
            <div class="col-lg-12">
                @include('dashboard.user.partials.dashboard.top_card')

                <div class="container-fluid mb-4">
                    <div class="row g-4">
                        @include('dashboard.user.partials.dashboard.left_column_balance_and_quick_action')

                        @include('dashboard.user.partials.dashboard.right_column_recent_transaction_and_account_statistics')
                    </div>
                </div>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    @push('scripts')
        <!-- JS Toggle -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const toggleBtn = document.querySelector(".toggle-balance");
                const balances = document.querySelectorAll(".balance-amount");
                let hidden = false;

                toggleBtn.addEventListener("click", function() {
                    hidden = !hidden;
                    balances.forEach(b => {
                        if (hidden) {
                            b.textContent = "••••••";
                        } else {
                            b.textContent = b.getAttribute("data-original");
                        }
                    });
                    toggleBtn.innerHTML = hidden ?
                        '<i class="fa-solid fa-eye-slash"></i>' :
                        '<i class="fa-solid fa-eye"></i>';
                });
            });
        </script>
    @endpush
@endsection
