<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: false, mobileMenuOpen: false }" x-init="darkMode = localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)" :class="{ 'dark': darkMode }">

    <head>
        <title>Home - First Truist Credit Union</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="3GLYtLNj0mU7CAjVDGsvmdGAF6oicfxkHyfnLTKA">
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="First Truist Credit Union">
        <meta name="application-name" content="First Truist Credit Union">
        <meta name="description"
            content="Swift and Secure Money Transfer to any UK bank account will become a breeze with First Truist Credit Union.">
        <link rel="shortcut icon"
            href="/frontend/storage/app/public/photos/QeDeSHnRvDtKS1uEZmq5svmALu0FqZgcUBzHS5hx.png">

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
    </head>

    <body class="font-sans bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">

        @include('frontend.layouts.partials.mobile_fixed_login_register_button')

        @include('frontend.layouts.nav')

        @yield('content')

        @include('frontend.layouts.footer')

        @include('frontend.layouts.partials.mobile_fixed_login_register_button_two')

        @include('frontend.layouts.partials.additional_script')

        @include('frontend.layouts.partials.language_translation_script')
    </body>

</html>
