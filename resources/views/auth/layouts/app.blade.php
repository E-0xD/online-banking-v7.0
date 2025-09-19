<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: false }" x-init="darkMode = localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)" :class="{ 'dark': darkMode }">

    <head>
        <title>{{ $title }} - {{ config('app.name') }}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="description" content="{{ config('app.meta.description') }}">
        <meta property="og:type" content="website" />
        <meta property="og:image" content="{{ asset(config('app.assets.og_image')) }}" />
        <link rel="shortcut icon" href="{{ asset(config('app.assets.favicon')) }}">

        @include('auth.layouts.partials.dark_mode_initialization')
        @include('auth.layouts.partials.tailwind_css_with_custom_color_variable')

        <!-- Alpine.js -->
        <script defer src="/frontend/cdn.jsdelivr.net/npm/alpinejs%403.x.x/dist/cdn.min.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="/frontend/cdn.jsdelivr.net/gh/aquawolf04/font-awesome-pro%405cd1511/css/all.css">

        <!-- External Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
            rel="stylesheet">

        @include('auth.layouts.partials.style')

        <script src="{{ asset('assets/js/sweet_alert2.js') }}"></script>

    </head>

    <body class="font-sans bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex min-h-screen">
        @include('auth.layouts.partials.ultra_modern_page_loader')

        @include('auth.layouts.partials.dark_mode_toggle_floating_button')

        <!-- Main Content -->
        <div class="w-full">

            @yield('content')

        </div>

        {{-- @if (request()->routeIs('login')) --}}
        @include('auth.layouts.partials.script')

        @include('auth.layouts.partials.style_bottom')
        {{-- @elseif(request()->routeIs('register')) --}}
        @include('auth.layouts.partials.register_script')

        @include('auth.layouts.partials.register_style_bottom')
        {{-- @endif --}}

        @include('partials.live_chat')
    </body>

</html>
