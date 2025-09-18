<!-- Enhanced Footer -->
<footer
    class="relative bg-gradient-to-br from-slate-900 via-primary-900 to-slate-900 dark:from-gray-900 dark:via-primary-900 dark:to-gray-900 text-white py-16 mb-20 lg:mb-0 overflow-hidden">
    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-20 -left-20 w-40 h-40 bg-primary-600/20 rounded-full blur-3xl animate-pulse">
        </div>
        <div class="absolute top-1/2 -right-20 w-32 h-32 bg-teal-500/20 rounded-full blur-2xl animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute -bottom-20 left-1/3 w-36 h-36 bg-purple-600/20 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 2s;"></div>

        <!-- Floating geometric shapes -->
        <div class="absolute top-10 right-1/4 w-4 h-4 bg-white/10 rotate-45 animate-bounce"
            style="animation-delay: 0.5s;"></div>
        <div class="absolute bottom-1/4 left-1/4 w-3 h-3 bg-primary-300/30 rounded-full animate-bounce"
            style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/3 left-1/2 w-2 h-2 bg-teal-400/40 rotate-45 animate-bounce"
            style="animation-delay: 2.5s;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Footer Content -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- Company Info with enhanced styling -->
            <div class="lg:col-span-1">
                <div class="group mb-6">
                    <div class="relative inline-block">
                        <div
                            class="absolute inset-0 bg-white/20 rounded-2xl blur-lg group-hover:bg-white/30 transition-all duration-300">
                        </div>
                        <img src="{{ asset(config('app.assets.logo')) }}" alt="{{ config('app.name') }}"
                            class="relative h-10 w-auto">
                    </div>
                </div>
                <p class="text-primary-100 mb-6 text-sm leading-relaxed">
                    {{ config('app.slogan') }}
                </p>

                <!-- Enhanced Social Links -->
                <div class="flex space-x-3">
                    <a href="#"
                        class="group relative w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 hover:from-blue-600 hover:to-blue-700 rounded-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-xl">
                        <i
                            class="fa-brands fa-facebook-f text-sm group-hover:scale-110 transition-transform duration-300"></i>
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </a>
                    <a href="#"
                        class="group relative w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 hover:from-sky-500 hover:to-sky-600 rounded-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-xl">
                        <i
                            class="fa-brands fa-twitter text-sm group-hover:scale-110 transition-transform duration-300"></i>
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-sky-400 to-sky-500 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </a>
                    <a href="#"
                        class="group relative w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 hover:from-blue-700 hover:to-blue-800 rounded-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-xl">
                        <i
                            class="fa-brands fa-linkedin-in text-sm group-hover:scale-110 transition-transform duration-300"></i>
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </a>
                    <a href="#"
                        class="group relative w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 hover:from-pink-600 hover:to-pink-700 rounded-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-xl">
                        <i
                            class="fa-brands fa-instagram text-sm group-hover:scale-110 transition-transform duration-300"></i>
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </a>
                </div>
            </div>

            <!-- Quick Links with modern styling -->
            <div>
                <h4 class="font-bold mb-6 text-white flex items-center">
                    <div class="w-1 h-6 bg-gradient-to-b from-primary-400 to-primary-600 rounded-full mr-3">
                    </div>
                    Quick Links
                </h4>
                <ul class="space-y-3">
                    <li><a href="about.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-primary-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">About
                                Us</span>
                        </a></li>
                    <li><a href="chart.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-primary-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Services</span>
                        </a></li>
                    <li><a href="grants.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-primary-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Grants &
                                Aid</span>
                        </a></li>
                    <li><a href="contact.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-primary-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Contact</span>
                        </a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="font-bold mb-6 text-white flex items-center">
                    <div class="w-1 h-6 bg-gradient-to-b from-teal-400 to-teal-600 rounded-full mr-3"></div>
                    Services
                </h4>
                <ul class="space-y-3">
                    <li><a href="chart.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-teal-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Personal
                                Banking</span>
                        </a></li>
                    <li><a href="alerts.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-teal-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Business
                                Banking</span>
                        </a></li>
                    <li><a href="send-money.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-teal-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Loans &
                                Credit</span>
                        </a></li>
                    <li><a href="login.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-teal-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Cards</span>
                        </a></li>
                </ul>
            </div>

            <!-- Member Services -->
            <div>
                <h4 class="font-bold mb-6 text-white flex items-center">
                    <div class="w-1 h-6 bg-gradient-to-b from-purple-400 to-purple-600 rounded-full mr-3">
                    </div>
                    Member Services
                </h4>
                <ul class="space-y-3">
                    <li><a href="login.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-purple-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Online
                                Banking</span>
                        </a></li>
                    <li><a href="apps.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-purple-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Mobile
                                App</span>
                        </a></li>
                    <li><a href="contact.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-purple-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">ATM
                                Locations</span>
                        </a></li>
                    <li><a href="verify.html"
                            class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i
                                class="fa-solid fa-chevron-right text-xs mr-3 text-purple-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Security
                                Center</span>
                        </a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Footer with enhanced styling -->
        <div class="border-t border-primary-700/50 pt-8">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-6">
                    <p class="text-primary-100 text-sm">
                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </p>
                    <div class="flex items-center space-x-2 text-primary-200 text-xs">
                        <i class="fa-solid fa-shield-alt text-green-400"></i>
                        <span>FDIC Insured</span>
                        <span class="text-primary-400">•</span>
                        <i class="fa-solid fa-lock text-blue-400"></i>
                        <span>256-bit SSL</span>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center lg:justify-end space-x-6">
                    <a href="privacy.html"
                        class="text-primary-100 hover:text-white text-sm transition-colors duration-300 hover:underline">Privacy
                        Policy</a>
                    <a href="terms-of-service.html"
                        class="text-primary-100 hover:text-white text-sm transition-colors duration-300 hover:underline">Terms
                        of Service</a>
                    <a href="contact.html"
                        class="text-primary-100 hover:text-white text-sm transition-colors duration-300 hover:underline">Accessibility</a>
                    <a href="/"
                        class="text-primary-100 hover:text-white text-sm transition-colors duration-300 hover:underline">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>
