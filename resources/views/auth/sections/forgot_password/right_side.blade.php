 <!-- Right Side - Password Reset Form -->
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
             <h1 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Forgot Password</h1>
             <p class="text-sm text-gray-600 dark:text-gray-400">Reset your password</p>
         </div>

         <!-- Enhanced Alerts -->
         @include('partials.tailwind_alert')

         <!-- Enhanced Password Reset Card -->
         <div
             class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">
             <!-- Card Header -->
             <div class="px-6 pt-6 pb-4 border-b border-gray-100/50 dark:border-gray-700/50 text-center">
                 <div
                     class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-primary-100/50 dark:bg-primary-800/50 backdrop-blur-sm mb-4">
                     <i class="fas fa-envelope text-2xl text-primary-600 dark:text-primary-300"></i>
                 </div>
                 <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Reset Your Password</h2>
                 <p class="text-sm text-gray-600 dark:text-gray-400">Enter your email to receive a reset link</p>
             </div>

             <!-- Password Reset Form -->
             <div class="px-6 pb-6 pt-4">
                 <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                     @csrf
                     <!-- Email Field -->
                     <div class="space-y-1">
                         <label for="email"
                             class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Email
                             Address</label>
                         <div class="input-wrapper group">
                             <div class="relative">
                                 <div class="input-icon group-focus-within:text-primary-500 transition-colors z-10">
                                     <i class="fas fa-envelope text-sm"></i>
                                 </div>
                                 <input id="email" type="email" name="email" value="{{ old('email') }}"
                                     class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                     placeholder="name@email.com" required autocomplete="email">
                             </div>
                             @error('email')
                                 <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                             @enderror
                         </div>
                     </div>

                     <!-- Submit Button -->
                     <div class="pt-2">
                         <button type="submit"
                             class="w-full py-3 px-4 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 dark:from-primary-700 dark:to-primary-800 dark:hover:from-primary-600 dark:hover:to-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center group text-sm">
                             <i
                                 class="fas fa-paper-plane mr-2 group-hover:translate-x-1 transition-transform text-sm"></i>
                             <span>Send Password Reset Link</span>
                         </button>
                     </div>

                     <!-- Back to Login -->
                     <div class="pt-1">
                         <a href="{{ route('login') }}"
                             class="w-full py-3 px-4 bg-gray-100/90 dark:bg-gray-700/90 hover:bg-gray-200/90 dark:hover:bg-gray-600/90 text-gray-800 dark:text-gray-200 font-medium rounded-xl transition-all duration-300 flex items-center justify-center group text-sm backdrop-blur-sm border border-gray-200/50 dark:border-gray-600/50">
                             <i
                                 class="fas fa-sign-in-alt mr-2 group-hover:-translate-x-1 transition-transform text-sm"></i>
                             Return to Login
                         </a>
                     </div>
                 </form>
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
