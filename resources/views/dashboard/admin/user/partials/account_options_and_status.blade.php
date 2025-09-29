<div class="col-12">
    <div class="d-flex gap-2 justify-content-end mb-2">
        <div class="dropdown">
            <button class="btn btn-danger btn-sm dropdown-toggle " type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                ACCOUNT OPTIONS
            </button>
            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"
                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 40px);"
                data-popper-placement="bottom-start">
                <a class="dropdown-item" href="{{ route('admin.user.show', $user->uuid) }}">
                    <i class="fa-solid fa-user me-1"></i>Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa-solid fa-wallet me-1"></i>Fund Account
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa-solid fa-history me-1"></i>Withdrawals
                </a>
                <a class="dropdown-item" href="{{ route('admin.user.deposit.index', $user->uuid) }}">
                    <i class="fa-solid fa-coins me-1"></i>Deposits
                </a>
                <a class="dropdown-item" href="{{ route('admin.user.irs_tax_refund.index', $user->uuid) }}">
                    <i class="ti ti-receipt-tax me-1"></i>Tax Refunds
                </a>
                <a class="dropdown-item" href="{{ route('admin.user.loan.index', $user->uuid) }}"> <i
                        class="fa-solid fa-file-import me-1"></i>Loans</a>
                <a class="dropdown-item" href="{{ route('admin.user.grant_application.index', $user->uuid) }}"> <i
                        class="fa-solid fa-gift me-1"></i>Grants</a>
                <a class="dropdown-item" href="{{ route('admin.user.card.index', $user->uuid) }}">
                    <i class="fa-solid fa-credit-card me-1"></i>Cards</a>
                <a class="dropdown-item" href="{{ route('admin.user.support.index', $user->uuid) }}">
                    <i class="ti ti-help-circle me-1"></i>Support Tickets</a>
                <a class="dropdown-item" href="{{ route('admin.user.notification.index', $user->uuid) }}">
                    <i class="fa-solid fa-bell me-1"></i>Notifications
                </a>
            </div>
        </div>

        <div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle " type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                STATUS
            </button>
            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton"
                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 40px);"
                data-popper-placement="bottom-start">
                <a class="dropdown-item" href="{{ route('admin.user.kyc.index', $user->uuid) }}"> <i
                        class="fa-solid fa-id-card me-1"></i> KYC Verification</a>
                <a class="dropdown-item" href="{{ route('admin.user.account_state.index', $user->uuid) }}"> <i
                        class="fa-solid fa-lock me-1"></i> Account State
                    Setting</a>
                <a class="dropdown-item" href="#"> <i class="fa-solid fa-trash me-1"></i> Delete Account</a>
            </div>
        </div>
    </div>
</div>
