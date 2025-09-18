<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: false, mobileMenuOpen: false }" x-init="darkMode = localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)" :class="{ 'dark': darkMode }">

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

        @include('frontend.layouts.partials.dark_mode_initialization')

        @include('frontend.layouts.partials.tailwind_custom_color_variables')

        <!-- Alpine.js -->
        <script defer src="/frontend/cdn.jsdelivr.net/npm/alpinejs%403.x.x/dist/cdn.min.js"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="/frontend/cdn.jsdelivr.net/gh/aquawolf04/font-awesome-pro%405cd1511/css/all.css">

        <!-- External Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
            rel="stylesheet">

        @include('frontend.layouts.partials.style')

        @include('partials.google_translator')
    </head>

    <body class="font-sans bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">

        @include('frontend.layouts.partials.mobile_fixed_login_register_button')

        @include('frontend.layouts.nav')

        @yield('content')

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.mobile_fixed_login_register_button_two')

        @include('frontend.layouts.partials.additional_script')

        @include('frontend.layouts.partials.language_translation_script')

        @include('partials.live_chat')
    </body>

</html>
