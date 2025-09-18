<!-- Navigation Header -->
<nav
    class="relative bg-gradient-to-r from-white via-primary-50 to-white dark:from-gray-900 dark:via-primary-900 dark:to-gray-900 backdrop-blur-xl border-b border-gradient-to-r from-transparent via-primary-200/50 to-transparent dark:border-primary-700/30 sticky top-0 z-50 shadow-lg shadow-primary-500/5">
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute -top-10 -left-10 w-20 h-20 bg-primary-200/20 dark:bg-primary-800/20 rounded-full blur-xl animate-pulse">
        </div>
        <div class="absolute -top-5 right-1/4 w-16 h-16 bg-teal-200/20 dark:bg-teal-800/20 rounded-full blur-lg animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-purple-200/20 dark:bg-purple-800/20 rounded-full blur-xl animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 lg:h-18">
            <!-- Logo with glow effect -->
            <div class="flex items-center group">
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-primary-400/20 rounded-xl blur-lg group-hover:bg-primary-400/30 transition-all duration-300">
                    </div>
                    <img src="{{ asset(config('app.assets.logo')) }}" alt="{{ config('app.name') }}"
                        class="relative h-10 lg:h-10 w-auto">
                </div>
            </div>

            <!-- Desktop Navigation with modern styling -->
            <div class="hidden lg:flex items-center space-x-1">
                <a href="/"
                    class="relative px-4 py-2 text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:text-primary-600 dark:hover:text-primary-400 group">
                    <span class="relative z-10">Home</span>
                    <div
                        class="absolute inset-0 bg-primary-50 dark:bg-primary-900/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300 origin-center">
                    </div>
                </a>
                <a href="about.html"
                    class="relative px-4 py-2 text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:text-primary-600 dark:hover:text-primary-400 group">
                    <span class="relative z-10">About</span>
                    <div
                        class="absolute inset-0 bg-primary-50 dark:bg-primary-900/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300 origin-center">
                    </div>
                </a>
                <div class="relative group">
                    <button
                        class="relative px-4 py-2 text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:text-primary-600 dark:hover:text-primary-400 flex items-center">
                        <span class="relative z-10">Services</span>
                        <i
                            class="fa-solid fa-chevron-down ml-1 text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                        <div
                            class="absolute inset-0 bg-primary-50 dark:bg-primary-900/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300 origin-center">
                        </div>
                    </button>
                    <!-- Services Dropdown -->
                    <div
                        class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <div class="p-2">
                            <a href="chart.html"
                                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                <i class="fa-solid fa-user mr-3 text-primary-500"></i>
                                Personal Banking
                            </a>
                            <a href="alerts.html"
                                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                <i class="fa-solid fa-briefcase mr-3 text-blue-500"></i>
                                Business Banking
                            </a>
                            <a href="send-money.html"
                                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                <i class="fa-solid fa-handshake mr-3 text-green-500"></i>
                                Loans & Credit
                            </a>
                            <a href="login.html"
                                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                <i class="fa-solid fa-credit-card mr-3 text-purple-500"></i>
                                Cards
                            </a>
                            <a href="grants.html"
                                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                <i class="fa-solid fa-hand-holding-dollar mr-3 text-orange-500"></i>
                                Grants & Aid
                            </a>
                        </div>
                    </div>
                </div>
                <a href="contact.html"
                    class="relative px-4 py-2 text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:text-primary-600 dark:hover:text-primary-400 group">
                    <span class="relative z-10">Contact</span>
                    <div
                        class="absolute inset-0 bg-primary-50 dark:bg-primary-900/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300 origin-center">
                    </div>
                </a>
            </div>

            <!-- Desktop Action Buttons with enhanced styling -->
            <div class="hidden lg:flex items-center space-x-3">

                <!-- Dark Mode Toggle with animation -->
                <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                    class="relative p-3 rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 text-gray-600 dark:text-gray-300 hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 group">
                    <i class="fa-solid fa-sun text-lg group-hover:rotate-180 transition-transform duration-500"
                        x-show="darkMode"></i>
                    <i class="fa-solid fa-moon text-lg group-hover:rotate-12 transition-transform duration-300"
                        x-show="!darkMode"></i>
                </button>

                <!-- Login Button with hover effects -->
                <a href="login.html"
                    class="relative px-4 py-2.5 text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-semibold transition-all duration-300 group">
                    <span class="relative z-10">Login</span>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-primary-50 to-primary-100 dark:from-primary-900/30 dark:to-primary-800/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300">
                    </div>
                </a>

                <!-- Open Account Button with premium styling -->
                <a href="register.html"
                    class="relative px-6 py-2.5 bg-gradient-to-r from-primary-600 via-primary-500 to-primary-600 hover:from-primary-700 hover:via-primary-600 hover:to-primary-700 text-white font-semibold rounded-2xl transition-all duration-300 shadow-lg shadow-primary-600/25 hover:shadow-xl hover:shadow-primary-600/40 hover:-translate-y-0.5 group overflow-hidden">
                    <span class="relative z-10 flex items-center">
                        <i class="fa-solid fa-sparkles mr-2 group-hover:animate-spin"></i>
                        Open Account
                    </span>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                    </div>
                </a>
            </div>

            <!-- Mobile Menu Button with modern design -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden relative p-3 rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 text-gray-600 dark:text-gray-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
                <i class="fa-solid fa-bars text-lg transition-transform duration-300" x-show="!mobileMenuOpen"
                    :class="{ 'rotate-180': mobileMenuOpen }"></i>
                <i class="fa-solid fa-times text-lg transition-transform duration-300" x-show="mobileMenuOpen"
                    :class="{ 'rotate-180': !mobileMenuOpen }"></i>
            </button>
        </div>
    </div>

    <!-- Enhanced Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-1 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-1 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden absolute top-full left-0 right-0 bg-gradient-to-br from-white via-primary-50 to-white dark:from-gray-900 dark:via-primary-900 dark:to-gray-900 backdrop-blur-xl border-t border-primary-200/70 dark:border-primary-700/50 shadow-2xl shadow-primary-500/20">

        <!-- Mobile menu background pattern -->
        <div class="absolute inset-0 overflow-hidden">
            <div
                class="absolute top-0 left-1/4 w-32 h-32 bg-primary-200/20 dark:bg-primary-800/20 rounded-full blur-2xl">
            </div>
            <div class="absolute bottom-0 right-1/4 w-24 h-24 bg-teal-200/20 dark:bg-teal-800/20 rounded-full blur-xl">
            </div>
        </div>

        <div class="relative px-6 py-6 space-y-2">
            <!-- Navigation Links with enhanced styling -->
            <a href="/"
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                <i
                    class="fa-solid fa-home mr-4 text-primary-500 group-hover:scale-110 transition-transform duration-300"></i>
                <span>Home</span>
                <i
                    class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
            </a>
            <a href="about.html"
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                <i
                    class="fa-solid fa-info-circle mr-4 text-teal-500 group-hover:scale-110 transition-transform duration-300"></i>
                <span>About</span>
                <i
                    class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
            </a>

            <!-- Services Submenu -->
            <div x-data="{ servicesOpen: false }" class="space-y-2">
                <button @click="servicesOpen = !servicesOpen"
                    class="flex items-center w-full px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                    <i
                        class="fa-solid fa-cogs mr-4 text-purple-500 group-hover:scale-110 transition-transform duration-300"></i>
                    <span>Services</span>
                    <i class="fa-solid fa-chevron-down ml-auto text-xs transition-transform duration-300"
                        :class="{ 'rotate-180': servicesOpen }"></i>
                </button>
                <div x-show="servicesOpen" x-transition class="ml-8 space-y-1">
                    <a href="chart.html"
                        class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                        <i class="fa-solid fa-user mr-3 text-primary-400"></i>
                        Personal Banking
                    </a>
                    <a href="alerts.html"
                        class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                        <i class="fa-solid fa-briefcase mr-3 text-blue-400"></i>
                        Business Banking
                    </a>
                    <a href="send-money.html"
                        class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                        <i class="fa-solid fa-handshake mr-3 text-green-400"></i>
                        Loans & Credit
                    </a>
                    <a href="login.html"
                        class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                        <i class="fa-solid fa-credit-card mr-3 text-purple-400"></i>
                        Cards
                    </a>
                    <a href="grants.html"
                        class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                        <i class="fa-solid fa-hand-holding-dollar mr-3 text-orange-400"></i>
                        Grants & Aid
                    </a>
                </div>
            </div>

            <a href="contact.html"
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                <i
                    class="fa-solid fa-envelope mr-4 text-orange-500 group-hover:scale-110 transition-transform duration-300"></i>
                <span>Contact</span>
                <i
                    class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
            </a>

            <!-- Additional Mobile Links -->
            <a href="apps.html"
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                <i
                    class="fa-solid fa-mobile-alt mr-4 text-indigo-500 group-hover:scale-110 transition-transform duration-300"></i>
                <span>Mobile App</span>
                <i
                    class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
            </a>

            <!-- Enhanced Dark Mode Toggle for Mobile -->
            <div class="pt-4 mt-4 border-t border-primary-700/50">

                <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)"
                    class="flex items-center w-full px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                    <div
                        class="flex items-center justify-center w-8 h-8 mr-4 rounded-xl bg-gradient-to-br from-yellow-400 to-orange-500 dark:from-blue-500 dark:to-purple-600 group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-sun text-white text-sm group-hover:rotate-180 transition-transform duration-500"
                            x-show="darkMode"></i>
                        <i class="fa-solid fa-moon text-white text-sm group-hover:rotate-12 transition-transform duration-300"
                            x-show="!darkMode"></i>
                    </div>
                    <span x-text="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'"></span>
                    <i
                        class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
