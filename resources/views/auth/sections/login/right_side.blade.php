 <!-- Right Side - Login Form -->
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
             <h1 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Welcome Back</h1>
             <p class="text-sm text-gray-600 dark:text-gray-400">Sign in to {{ config('app.name') }}
             </p>
         </div>

         <!-- Enhanced Alerts -->
         @include('partials.tailwind_alert')

         <!-- Enhanced Login Card -->
         <div
             class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">
             <!-- Card Header -->
             <div class="px-6 pt-6 pb-4 border-b border-gray-100/50 dark:border-gray-700/50">
                 <div class="hidden lg:block">
                     <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1">Sign In</h2>
                     <p class="text-sm text-gray-600 dark:text-gray-400">Access your {{ config('app.name') }} account
                     </p>
                 </div>
                 <div class="lg:hidden">
                     <h2 class="text-lg font-bold text-gray-900 dark:text-white text-center">Enter Your
                         Credentials</h2>
                 </div>
             </div>

             <!-- Login Form -->
             <div class="px-6 pb-6 pt-4">
                 <form method="POST" action="{{ route('login') }}" class="space-y-4">
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
                                 <input id="email" type="email" name="email"
                                     class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                     placeholder="Enter your email address" required autocomplete="email"
                                     value="{{ old('email') }}">
                             </div>
                             @error('email')
                                 <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                             @enderror
                         </div>
                     </div>

                     <!-- Password Field -->
                     <div class="space-y-1">
                         <div class="flex items-center justify-between">
                             <label for="password"
                                 class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Password</label>
                             <a href="{{ route('password.request') }}"
                                 class="text-xs font-medium text-primary-600 dark:text-primary-400 hover:text-primary-500 dark:hover:text-primary-300 transition-colors">
                                 Forgot Password?
                             </a>
                         </div>
                         <div class="input-wrapper group">
                             <div class="relative">
                                 <div class="input-icon group-focus-within:text-primary-500 transition-colors z-10">
                                     <i class="fas fa-lock text-sm"></i>
                                 </div>
                                 <input id="password" type="password" name="password"
                                     class="w-full pl-10 pr-12 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                     placeholder="Enter your password" required autocomplete="current-password">
                                 <button type="button" onclick="togglePasswordVisibility()"
                                     class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 dark:text-gray-500 hover:text-primary-500 transition-colors">
                                     <i class="fas fa-eye text-sm" id="show-password"></i>
                                     <i class="fas fa-eye-slash hidden text-sm" id="hide-password"></i>
                                 </button>
                             </div>
                             @error('password')
                                 <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                             @enderror
                         </div>
                     </div>

                     <!-- Remember Me -->
                     <div class="flex items-center justify-between pt-1">
                         <label class="inline-flex items-center group cursor-pointer" for="remember_me">
                             <input type="checkbox" name="remember" id="remember_me"
                                 class="rounded border-gray-300/50 dark:border-gray-600/50 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200/50 focus:ring-opacity-50 dark:bg-gray-700/50 transition-all"
                                 checked>
                             <span
                                 class="ml-2 text-xs font-medium text-gray-600 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-gray-200 transition-colors">
                                 Keep me signed in
                             </span>
                         </label>
                     </div>

                     <!-- Submit Button -->
                     <div class="pt-2">
                         <button type="submit"
                             class="w-full py-3 px-4 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 dark:from-primary-700 dark:to-primary-800 dark:hover:from-primary-600 dark:hover:to-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center group text-sm">
                             <i
                                 class="fas fa-sign-in-alt mr-2 group-hover:translate-x-1 transition-transform text-sm"></i>
                             <span>Sign In to Account</span>
                         </button>
                     </div>

                     <!-- Divider -->
                     <div class="relative py-3">
                         <div class="absolute inset-0 flex items-center">
                             <div class="w-full border-t border-gray-200/50 dark:border-gray-700/50">
                             </div>
                         </div>
                         <div class="relative flex justify-center text-xs">
                             <span
                                 class="px-3 bg-white/90 dark:bg-gray-800/90 text-gray-500 dark:text-gray-400 font-medium">
                                 New to {{ config('app.name') }}?
                             </span>
                         </div>
                     </div>

                     <!-- Create Account Button -->
                     <div>
                         <a href="{{ route('register') }}"
                             class="w-full py-3 px-4 bg-gray-100/80 dark:bg-gray-700/80 hover:bg-gray-200/80 dark:hover:bg-gray-600/80 text-gray-800 dark:text-gray-200 font-semibold rounded-xl border border-gray-200/50 dark:border-gray-600/50 backdrop-blur-sm transition-all duration-300 flex items-center justify-center group hover:scale-[1.02] text-sm">
                             <i class="fas fa-user-plus mr-2 group-hover:scale-110 transition-transform text-sm"></i>
                             <span>Create New Account</span>
                         </a>
                     </div>
                 </form>
             </div>
         </div>

         <!-- Enhanced Footer Links -->
         <div class="mt-6 text-center space-y-3">
             <div class="flex items-center justify-center space-x-4 text-xs">
                 <a href="{{ route('privacy_policy') }}"
                     class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors font-medium flex items-center">
                     <i class="fas fa-shield-alt mr-1 text-xs"></i>
                     Privacy Policy
                 </a>
                 <a href="{{ route('contact') }}"
                     class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors font-medium flex items-center">
                     <i class="fas fa-headset mr-1 text-xs"></i>
                     Support
                 </a>
                 <a href="{{ route('term_of_service') }}"
                     class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors font-medium flex items-center">
                     <i class="fas fa-file-contract mr-1 text-xs"></i>
                     Terms
                 </a>
             </div>
             <p class="text-xs text-gray-500 dark:text-gray-500 max-w-xs mx-auto leading-relaxed">
                 By signing in, you agree to our Terms of Service and Privacy Policy.
                 Your data is protected with bank-grade security.
             </p>
         </div>
     </div>
 </div>
