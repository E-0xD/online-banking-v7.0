<!-- Right Side - Verification Form -->
<div
    class="w-full lg:w-1/2 flex flex-col justify-center items-center p-3 lg:p-8 bg-gray-50/50 dark:bg-gray-900/50 backdrop-blur-sm">
    <div class="w-full max-w-sm">
        <!-- Mobile Header -->
        <div class="lg:hidden text-center mb-6">
            <div class="relative inline-block mb-3 mt-10">
                <div class="absolute inset-0 bg-primary-500/20 rounded-2xl blur-lg"></div>
                <div
                    class="relative bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm rounded-2xl p-3 border border-gray-200/50 dark:border-gray-700/50">
                    <img src="{{ asset(config('app.assets.logo')) }}" alt="Logo" class="h-10 mx-auto">
                </div>
            </div>
            <h1 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Two-Factor Auth</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">Enter verification code</p>
        </div>

        <!-- Enhanced Alerts -->
        {{-- <div class="bg-blue-50/90 dark:bg-blue-900/30 backdrop-blur-sm border border-blue-200/50 dark:border-blue-800/50 text-blue-700 dark:text-blue-300 p-3 mb-4 rounded-xl"
            role="alert">
            <div class="flex items-center">
                <i class="fas fa-info-circle mr-2 text-blue-500 text-sm"></i>
                <p class="text-sm font-medium">A verification code has been sent to your email address.
                </p>
            </div>
        </div> --}}

        @include('partials.tailwind_alert')

        <!-- Enhanced Verification Card -->
        <div
            class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">
            <!-- Card Header -->
            <div class="px-6 pt-6 pb-4 border-b border-gray-100/50 dark:border-gray-700/50 text-center">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary-100/50 dark:bg-primary-800/50 backdrop-blur-sm mb-4">
                    <i class="fas fa-envelope-open-text text-2xl text-primary-600 dark:text-primary-300"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Two-Factor Authentication</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Enter the 6-digit code sent to your email</p>
            </div>

            <!-- Verification Form -->
            <div class="px-6 pb-6 pt-4">
                <form method="POST" action="{{ route('two_factor_authentication', ['id' => $user->uuid]) }}"
                    class="space-y-4">
                    @csrf
                    <!-- Verification Code Field -->
                    <div class="space-y-1">
                        <label for="verification_code"
                            class="block text-xs font-semibold text-gray-700 dark:text-gray-300 text-center">Verification
                            Code</label>
                        <div class="input-wrapper group">
                            <div class="relative">
                                <input type="text" name="verification_code" id="verification_code"
                                    class="w-full px-4 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-center tracking-widest text-lg font-semibold"
                                    placeholder="XXXXXX" maxlength="6" autocomplete="off" required>
                            </div>
                            @error('verification_code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full py-3 px-4 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 dark:from-primary-700 dark:to-primary-800 dark:hover:from-primary-600 dark:hover:to-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center group text-sm">
                            <i
                                class="fas fa-sign-in-alt mr-2 group-hover:translate-x-1 transition-transform text-sm"></i>
                            <span>Verify and Login</span>
                        </button>
                    </div>
                </form>

                <!-- Action Buttons -->
                <div class="mt-4 space-y-3">
                    <form action="{{ route('two_factor_authentication.send', ['id' => $user->uuid]) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full py-3 px-4 bg-gray-100/90 dark:bg-gray-700/90 hover:bg-gray-200/90 dark:hover:bg-gray-600/90 text-gray-800 dark:text-gray-200 font-medium rounded-xl transition-all duration-300 flex items-center justify-center group text-sm backdrop-blur-sm border border-gray-200/50 dark:border-gray-600/50">
                            <i class="fas fa-redo mr-2 group-hover:rotate-180 transition-transform text-sm"></i>
                            Resend Verification Code
                        </button>
                    </form>
                </div>

                <!-- Help Section -->
                <div
                    class="mt-4 bg-gray-50/50 dark:bg-gray-700/30 backdrop-blur-sm rounded-xl p-4 border border-gray-200/30 dark:border-gray-600/30">
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2 flex items-center">
                        <i class="fas fa-question-circle mr-2 text-primary-500 text-xs"></i>
                        Didn't get the code?
                    </h3>
                    <ul class="text-xs text-gray-600 dark:text-gray-400 space-y-1">
                        <li class="flex items-center">
                            <i class="fas fa-dot-circle mr-2 text-gray-400 text-xs"></i>
                            Check your spam folder
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-dot-circle mr-2 text-gray-400 text-xs"></i>
                            Code expires after 60 minutes
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-dot-circle mr-2 text-gray-400 text-xs"></i>
                            Verify your email address
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="mt-6 text-center">
            <p class="text-xs text-gray-500 dark:text-gray-500 max-w-xs mx-auto leading-relaxed">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
            </p>
        </div>
    </div>
</div>
