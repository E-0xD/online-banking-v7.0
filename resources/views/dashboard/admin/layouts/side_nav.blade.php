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

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-layout-dashboard"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.user.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-users"></i></span>
                    <span class="menu-text"> Users </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarGrant" aria-expanded="false" aria-controls="sidebarGrant"
                    class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-gift"></i></span>
                    <span class="menu-text"> Grant Management</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarGrant">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('admin.grant_category.index') }}" class="side-nav-link">
                                <span class="menu-text">Grant Category</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="javascript:void(0);" class="side-nav-link">
                                <span class="menu-text">Grant</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.verification_code.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-lock"></i></span>
                    <span class="menu-text"> Verification Code </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.wallet.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-wallet"></i></span>
                    <span class="menu-text">Wallets </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('admin.setting.index') }}" class="side-nav-link">
                    <span class="menu-icon"><i class="ti ti-settings"></i></span>
                    <span class="menu-text"> Settings </span>
                </a>
            </li>
        </ul>
    </div>
</div>
