<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="/" class="logo">
        <img src="{{ asset(config('app.assets.logo')) }}" width="200" alt="logo">
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-sm-hover">
        <i class="ti ti-circle align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">Dashboard</li>

            <li class="side-nav-title mt-2">Main</li>

            <li class="side-nav-item">
                <a href="{{ route('user.dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-layout-dashboard"></i></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-arrows-exchange"></i></span>
                    <span class="menu-text">Transactions</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('user.card.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-credit-card"></i></span>
                    <span class="menu-text">Cards</span>
                </a>
            </li>

            @if ($user->kycIsPendingAndHasDocument() || $user->kycIsPendingAndHasNoDocument())
                <li class="side-nav-item">
                    <a href="{{ route('user.kyc.index') }}" class="side-nav-link">
                        <span class="menu-icon"><i class="ti ti-id"></i></span>
                        <span class="menu-text">KYC Verification</span>
                    </a>
                </li>
            @endif

            <li class="side-nav-title mt-2">Transfers</li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-arrow-right-circle"></i></span>
                    <span class="menu-text">Local Transfer</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-world"></i></span>
                    <span class="menu-text">International</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('user.deposit.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-wallet"></i></span>
                    <span class="menu-text">Deposit</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-exchange"></i></span>
                    <span class="menu-text">Currency Swap</span>
                </a>
            </li>

            <li class="side-nav-title mt-2">Services</li>

            <li class="side-nav-item">
                <a href="{{ route('user.loan.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-cash"></i></span>
                    <span class="menu-text">Loan</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('user.irs_tax_refund.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-receipt-tax"></i></span>
                    <span class="menu-text">Tax Refund</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('user.grant_application.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-gift"></i></span>
                    <span class="menu-text">Grants</span>
                </a>
            </li>

            <li class="side-nav-title mt-2">Account</li>

            <li class="side-nav-item">
                <a href="{{ route('user.profile.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-settings"></i></span>
                    <span class="menu-text">Settings</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('user.support.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-help-circle"></i></span>
                    <span class="menu-text">Support</span>
                </a>
            </li>
        </ul>

    </div>
</div>
