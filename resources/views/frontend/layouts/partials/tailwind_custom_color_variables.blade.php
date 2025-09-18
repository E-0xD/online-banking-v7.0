<!-- Tailwind CSS with custom color variables -->
<script src="https://cdn.tailwindcss.com/?plugins=forms,typography,aspect-ratio,line-clamp"></script>
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

                    'mobile-header-bg': '#1e293b', // Dark slate for mobile top section
                    'mobile-header-text': '#f1f5f9', // Light text for mobile top section

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
                    float: {
                        '0%, 100%': {
                            transform: 'translateY(0px)'
                        },
                        '50%': {
                            transform: 'translateY(-10px)'
                        },
                    },
                    'float-delayed': {
                        '0%, 100%': {
                            transform: 'translateY(0px) rotate(0deg)'
                        },
                        '50%': {
                            transform: 'translateY(-15px) rotate(180deg)'
                        },
                    }
                },
                animation: {
                    'pulse-slow': 'pulse 2.5s infinite',
                    'shine-once': 'shine 1.5s ease-in-out',
                    'float': 'float 3s ease-in-out infinite',
                    'float-delayed': 'float-delayed 4s ease-in-out infinite',
                }
            }
        }
    }
</script>
