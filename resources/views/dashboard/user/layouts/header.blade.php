<header class="app-topbar">
    <div class="page-container topbar-menu">
        <div class="d-flex align-items-center gap-2">

            <!-- Brand Logo -->
            <a href="/" class="logo">
                <img src="{{ asset(config('app.assets.logo')) }}" width="200" alt="logo">
            </a>

            <!-- Sidebar Menu Toggle Button -->
            <button class="sidenav-toggle-button px-2">
                <i class="ti ti-menu-deep fs-24"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ti ti-menu-deep fs-22"></i>
            </button>

            <div id="google_translate_element"></div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <!-- Notification Dropdown -->
            <div class="topbar-item d-none d-sm-flex">
                <div class="dropdown">
                    <button class="topbar-link dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown"
                        data-bs-offset="0,25" type="button" data-bs-auto-close="outside" aria-haspopup="false"
                        aria-expanded="false">
                        <i class="ti ti-bell animate-ring fs-22"></i>
                        <span class="noti-icon-badge"></span>
                    </button>

                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg" style="min-height: 300px;">
                        <div class="p-3 border-bottom border-dashed">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>
                                </div>
                                <div class="col-auto">
                                    <span class="fs-13">
                                        {{ auth()->user()->notification()->where('read', 0)->count() }} Unread</span>
                                </div>
                            </div>
                        </div>

                        @if (auth()->user()->notification()->count() > 0)
                            <div class="position-relative z-2 card shadow-none rounded-0" style="max-height: 300px;"
                                data-simplebar>
                                <!-- item-->
                                @foreach (auth()->user()->notification()->latest()->limit(10)->get() as $notification)
                                    <a href="{{ route('user.notification.show', $notification->uuid) }}">
                                        <div class="dropdown-item notification-item py-2 text-wrap {{ $notification->read ? '' : 'active' }}"
                                            id="notification-1">
                                            <span class="d-flex align-items-center">
                                                <span class="me-3 position-relative flex-shrink-0">
                                                    <img src="/assets/images/notification.png"
                                                        class="avatar-md rounded-circle" />
                                                    @if (!$notification->read)
                                                        <span
                                                            class="position-absolute rounded-pill bg-danger notification-badge">
                                                            <i class="ti ti-message-circle"></i>
                                                            <span class="visually-hidden">unread messages</span>
                                                        </span>
                                                    @endif
                                                </span>
                                                <span class="flex-grow-1 text-muted">
                                                    <span
                                                        class="fw-medium text-body">{{ ucwords($notification->title) }}</span>
                                                    <br><span
                                                        class="fw-medium text-body">{{ limitText($notification->description, 20) }}</span>
                                                    <br />
                                                    <span
                                                        class="fs-12">{{ $notification->created_at->diffForHumans() }}</span>
                                                </span>
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div style="height: 300px;"
                                class="d-flex align-items-center justify-content-center text-center position-absolute top-0 bottom-0 start-0 end-0 z-1">
                                <div>
                                    <iconify-icon icon="line-md:bell-twotone-alert-loop"
                                        class="fs-80 text-secondary mt-2"></iconify-icon>
                                    <h4 class="fw-semibold mb-0 fst-italic lh-base mt-3">Hey! 👋 <br />You have no
                                        any
                                        notifications</h4>
                                </div>
                            </div>
                        @endif

                        <!-- All-->
                        <a href="{{ route('user.notification.index') }}"
                            class="dropdown-item notification-item position-fixed z-2 bottom-0 text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2">
                            View All
                        </a>
                    </div>
                </div>
            </div>
            <!-- Light/Dark Mode Button -->
            <div class="topbar-item">
                <button class="topbar-link" id="light-dark-mode" type="button">
                    <i class="ti ti-moon fs-22"></i>
                </button>
            </div>

            <!-- User Dropdown -->
            <div class="topbar-item nav-user">
                <div class="dropdown">
                    <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"
                        data-bs-offset="0,19" type="button" aria-haspopup="false" aria-expanded="false">
                        @if (auth()->user()->image)
                            <img src="{{ asset(auth()->user()->image) }}" width="32"
                                class="rounded-circle me-lg-2 d-flex" alt="user-image">
                        @else
                            <img src="{{ asset('assets/images/avatar.png') }}" width="32"
                                class="rounded-circle me-lg-2 d-flex" alt="user-image">
                        @endif
                        <span class="d-lg-flex flex-column gap-1 d-none">
                            <h5 class="my-0">{{ auth()->user()->name }}</h5>
                            <h6 class="my-0 fw-normal">{{ auth()->user()->email }}</h6>
                        </span>
                        <i class="ti ti-chevron-down d-none d-lg-block align-middle ms-2"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="{{ route('user.kyc.index') }}" class="dropdown-item">
                            <i class="ti ti-id me-1 fs-17 align-middle"></i>
                            <span class="align-middle">KYC Verification</span>
                        </a>
                        <!-- item-->
                        <a href="{{ route('user.profile.index') }}" class="dropdown-item">
                            <i class="ti ti-user-hexagon me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Profile Settings</span>
                        </a>

                        <!-- item-->
                        <a href="{{ route('user.support.index') }}" class="dropdown-item">
                            <i class="ti ti-help me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Help & Support</span>
                        </a>

                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item active fw-semibold text-danger">
                                <i class="ti ti-logout me-1 fs-17 align-middle"></i>
                                <span class="align-middle">Sign Out</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
