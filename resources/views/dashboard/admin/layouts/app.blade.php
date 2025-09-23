<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>{{ $title }} &mdash; {{ config('app.name') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="{{ config('app.meta.keywords') }}" name="keywords">
        <meta content="{{ config('app.meta.description') }}" name="description">
        <meta property="og:title" content="{{ config('app.name') }} - {{ config('app.slogan') }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image" content="{{ asset(config('app.assets.og_image')) }}" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset(config('app.assets.favicon')) }}">

        <!-- Theme Config Js -->
        <script src="/dashboard/assets/js/config.js"></script>

        <!-- Vendor css -->
        <link href="/dashboard/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="/dashboard/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="/dashboard/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        @include('partials.google_translator')

        <script src="/assets/js/sweet_alert2.js"></script>

        <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        @livewireStyles
    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">

            <!-- Sidenav Menu Start -->
            @include('dashboard.admin.layouts.side_nav')
            <!-- Sidenav Menu End -->

            <!-- Topbar Start -->
            @include('dashboard.admin.layouts.header')
            <!-- Topbar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="page-content">

                {{-- @include('partials.sweet_alert') --}}

                @include('partials.bootstrap_alert')

                @yield('content')
                <!-- container -->

                <!-- Footer Start -->
                @include('dashboard.admin.layouts.footer')
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="/dashboard/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="/dashboard/assets/js/app.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable({
                    // Optional settings
                    pageLength: 10,
                    lengthMenu: [
                        [5, 10, 25, -1],
                        [5, 10, 25, "All"]
                    ],
                    ordering: true,
                    responsive: true
                });
            });
        </script>

        @livewireScripts

        @include('partials.live_chat')
    </body>

</html>
