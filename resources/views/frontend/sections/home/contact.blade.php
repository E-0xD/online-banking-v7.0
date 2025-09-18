<!-- Contact Section -->
<section class="py-12 lg:py-16 bg-primary-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-4 gap-6">
            <!-- Contact Info -->
            <div class="text-center lg:text-left">
                <div
                    class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center mx-auto lg:mx-0 mb-3">
                    <i class="fa-solid fa-clock text-lg text-primary-600 dark:text-primary-400"></i>
                </div>
                <h3 class="font-bold text-gray-900 dark:text-white mb-2 text-sm">Banking Hours</h3>
                <p class="text-gray-600 dark:text-gray-300 text-xs">
                    Mon-Fri: 9AM-5PM<br>
                    Sat: 9AM-1PM<br>
                    Sun: Closed
                </p>
            </div>

            @if (config('app.phone'))
                <div class="text-center lg:text-left">
                    <div
                        class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center mx-auto lg:mx-0 mb-3">
                        <i class="fa-solid fa-phone text-lg text-primary-600 dark:text-primary-400"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 dark:text-white mb-2 text-sm">Phone Banking</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-xs">
                        Available 24/7<br>
                        Call: {{ config('app.phone') }}<br>
                        International: {{ config('app.phone') }}
                    </p>
                </div>
            @endif

            <div class="text-center lg:text-left">
                <div
                    class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center mx-auto lg:mx-0 mb-3">
                    <i class="fa-solid fa-envelope text-lg text-primary-600 dark:text-primary-400"></i>
                </div>
                <h3 class="font-bold text-gray-900 dark:text-white mb-2 text-sm">Email Support</h3>
                <p class="text-gray-600 dark:text-gray-300 text-xs">
                    Response within 24hrs<br>
                    {{ config('app.email') }}
                </p>
            </div>

            @if (config('app.address'))
                <div class="text-center lg:text-left">
                    <div
                        class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center mx-auto lg:mx-0 mb-3">
                        <i class="fa-solid fa-map-marker-alt text-lg text-primary-600 dark:text-primary-400"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 dark:text-white mb-2 text-sm">Visit Us</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-xs">
                        {{ config('app.address') }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</section>
