<!-- Hero Section -->
<section
    class="relative h-screen min-h-[500px] lg:min-h-[600px] flex items-center justify-center overflow-hidden bg-primary-900">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="/frontend/images/home/metro.jpg" alt="Modern banking experience"
            class="w-full h-full object-cover object-[75%_25%] md:object-center" loading="eager"
            onload="this.style.opacity=1" style="opacity: 0; transition: opacity 0.3s ease;">
        <!-- Mobile Fallback Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900 via-primary-800 to-primary-900 lg:hidden">
        </div>
        <!-- Overlay -->
        <div
            class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/30 lg:from-black/70 lg:via-black/50 lg:to-transparent">
        </div>
    </div>

    <!-- Content Container -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="flex items-center min-h-[400px] lg:min-h-[500px]">
            <!-- Hero Content -->
            <div class="text-white w-full lg:w-1/2 text-center lg:text-left">
                <!-- Mobile Logo Icon -->
                <div class="lg:hidden flex justify-center mb-6">
                    <div
                        class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/20">
                        <i class="fa-solid fa-university text-2xl text-white"></i>
                    </div>
                </div>

                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 lg:mb-6">
                    {{ config('app.name') }}
                </h1>

                <!-- Mobile Tagline -->
                <p class="lg:hidden text-primary-100 text-lg font-medium mb-6">Your Digital Banking Partner</p>
                <P class="lg:hidden">We do banking differently. We believe that people come first, and that
                    everyone deserves a great experience every step of the way.</P>
                <br>

                <!-- Desktop Description -->
                <p class="hidden lg:block text-xl text-gray-200 mb-8 max-w-2xl leading-relaxed">
                    We do banking differently. We believe that people come first, and that everyone deserves a
                    great experience every step of the way.
                </p>

                <!-- Mobile Features
                <div class="lg:hidden space-y-3 mb-8">
                    <div class="flex items-center justify-center text-white bg-white/10 backdrop-blur-sm rounded-xl p-3 border border-white/20">
                        <i class="fa-solid fa-shield-halved text-primary-400 mr-3"></i>
                        <span class="text-sm font-medium">Secure & Protected Banking</span>
                    </div>
                    <div class="flex items-center justify-center text-white bg-white/10 backdrop-blur-sm rounded-xl p-3 border border-white/20">
                        <i class="fa-solid fa-mobile-alt text-teal-400 mr-3"></i>
                        <span class="text-sm font-medium">Mobile Banking 24/7</span>
                    </div>
                    <div class="flex items-center justify-center text-white bg-white/10 backdrop-blur-sm rounded-xl p-3 border border-white/20">
                        <i class="fa-solid fa-headset text-purple-400 mr-3"></i>
                        <span class="text-sm font-medium">Expert Support Always</span>
                    </div>
                </div> -->

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 lg:gap-4 mb-8 lg:mb-12">
                    <a href="register.html"
                        class="inline-flex items-center justify-center px-6 lg:px-8 py-3 lg:py-4 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-xl lg:rounded-2xl transition-all duration-300 shadow-2xl shadow-primary-600/30 hover:shadow-primary-600/50 hover:-translate-y-1 hover:scale-105">
                        <i class="fa-solid fa-user-plus mr-2 lg:mr-3"></i>
                        Open Account Today
                    </a>
                    <a href="login.html"
                        class="inline-flex items-center justify-center px-6 lg:px-8 py-3 lg:py-4 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white font-semibold rounded-xl lg:rounded-2xl transition-all duration-300 border border-white/30 hover:border-white/50 hover:-translate-y-1">
                        <i class="fa-solid fa-sign-in-alt mr-2 lg:mr-3"></i>
                        Login to Banking
                    </a>
                </div>

                <!-- Mobile Stats -->
                <div class="lg:hidden grid grid-cols-2 gap-4 pt-6 border-t border-white/20">
                    <div class="text-center">
                        <p class="text-xl font-bold text-white">50K+</p>
                        <p class="text-xs text-primary-100">Happy Customers</p>
                    </div>
                    <div class="text-center">
                        <p class="text-xl font-bold text-white">$2.5B+</p>
                        <p class="text-xs text-primary-100">Assets Managed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Info Cards - Hidden on Mobile -->
    <div class="hidden lg:block absolute bottom-0 left-0 right-0 z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-4 pb-8">
                <!-- Routing Number Card -->
                @if (config('app.routing_number'))
                    <div
                        class="bg-primary-600 hover:bg-primary-700 transition-all duration-300 rounded-2xl p-6 text-white shadow-2xl hover:shadow-primary-600/30 hover:-translate-y-2 group">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-primary-100 text-sm font-medium mb-1">ROUTING #</p>
                                <p class="text-2xl font-bold">{{ config('app.routing_number') }}</p>
                            </div>
                            <div
                                class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-university text-xl"></i>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Branch Hours Card -->
                <div
                    class="bg-teal-500 hover:bg-teal-600 transition-all duration-300 rounded-2xl p-6 text-white shadow-2xl hover:shadow-teal-500/30 hover:-translate-y-2 group">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-teal-100 text-sm font-medium mb-1">BRANCH HOURS</p>
                            <p class="text-lg font-bold">Mon-Fri: 9AM-5PM</p>
                            <p class="text-sm text-teal-100">Sat: 9AM-1PM</p>
                        </div>
                        <div
                            class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-clock text-xl"></i>
                        </div>
                    </div>
                </div>

                @if (config('app.phone'))
                    <!-- Contact Card -->
                    <div
                        class="bg-purple-600 hover:bg-purple-700 transition-all duration-300 rounded-2xl p-6 text-white shadow-2xl hover:shadow-purple-600/30 hover:-translate-y-2 group">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-purple-100 text-sm font-medium mb-1">24/7 SUPPORT</p>
                                <p class="text-lg font-bold">{{ config('app.phone') }}</p>
                                <p class="text-sm text-purple-100">Always here to help</p>
                            </div>
                            <div
                                class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-phone text-xl"></i>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 z-30">
        <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white/70 rounded-full mt-2 animate-bounce"></div>
        </div>
    </div>
</section>
