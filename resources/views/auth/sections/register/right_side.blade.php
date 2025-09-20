 <!-- Right Side - Registration Form -->
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
             <h1 class="text-xl font-bold text-gray-900 dark:text-white mb-1">Create Account</h1>
             <p class="text-sm text-gray-600 dark:text-gray-400">Join {{ config('app.name') }} today</p>
         </div>

         <!-- Enhanced Alerts -->

         <!-- Registration Card -->
         <div
             class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl rounded-2xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">
             <!-- Progress Header -->
             <div class="px-6 pt-6 pb-4 border-b border-gray-100/50 dark:border-gray-700/50">
                 <div class="flex justify-between items-center mb-3">
                     <h2 class="text-lg font-bold text-gray-900 dark:text-white">Create Account</h2>
                     <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Step <span
                             id="current-step">1</span> of 4</span>
                 </div>

                 <!-- Progress Bar -->
                 <div class="h-1.5 w-full bg-gray-200 dark:bg-gray-600 rounded-full overflow-hidden mb-2">
                     <div id="progress-bar"
                         class="h-full bg-gradient-to-r from-primary-600 to-primary-700 rounded-full transition-all duration-500 ease-in-out"
                         style="width: 25%"></div>
                 </div>

                 <!-- Step Indicators -->
                 <div class="flex justify-between text-xs">
                     <div class="flex flex-col items-center">
                         <div id="step-1-indicator"
                             class="w-6 h-6 rounded-full bg-primary-600 text-white flex items-center justify-center mb-1">
                             <i class="fas fa-user text-xs"></i>
                         </div>
                         <span class="text-primary-600 dark:text-primary-400 font-medium">Personal</span>
                     </div>
                     <div class="flex flex-col items-center">
                         <div id="step-2-indicator"
                             class="w-6 h-6 rounded-full bg-gray-300 dark:bg-gray-600 text-gray-500 flex items-center justify-center mb-1">
                             <i class="fas fa-envelope text-xs"></i>
                         </div>
                         <span class="text-gray-500 dark:text-gray-400">Contact</span>
                     </div>
                     <div class="flex flex-col items-center">
                         <div id="step-3-indicator"
                             class="w-6 h-6 rounded-full bg-gray-300 dark:bg-gray-600 text-gray-500 flex items-center justify-center mb-1">
                             <i class="fas fa-university text-xs"></i>
                         </div>
                         <span class="text-gray-500 dark:text-gray-400">Account</span>
                     </div>
                     <div class="flex flex-col items-center">
                         <div id="step-4-indicator"
                             class="w-6 h-6 rounded-full bg-gray-300 dark:bg-gray-600 text-gray-500 flex items-center justify-center mb-1">
                             <i class="fas fa-lock text-xs"></i>
                         </div>
                         <span class="text-gray-500 dark:text-gray-400">Security</span>
                     </div>
                 </div>
             </div>

             <!-- Form Container -->
             <div class="px-6 pb-6 pt-4">
                 @include('partials.tailwind_alert')
                 <form action="{{ route('register') }}" method="post" id="registration-form">
                     @csrf
                     <!-- Step 1: Personal Information -->
                     <div id="step-1" class="step-content">
                         <div class="text-center mb-4">
                             <div
                                 class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary-100/50 dark:bg-primary-800/50 backdrop-blur-sm mb-3">
                                 <i class="fas fa-user text-lg text-primary-600 dark:text-primary-300"></i>
                             </div>
                             <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-1">Personal Information
                             </h3>
                             <p class="text-xs text-gray-600 dark:text-gray-400">Tell us about yourself</p>
                         </div>

                         <div class="space-y-3">
                             <!-- First Name -->
                             <div class="space-y-1">
                                 <label for="name"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">First Name
                                     *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-user text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="text" id="name" name="name" value="{{ old('name') }}"
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="John" required>
                                 </div>
                                 @error('name')
                                     <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                 @enderror
                             </div>

                             <!-- Middle Name -->
                             <div class="space-y-1">
                                 <label for="middle_name"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Middle
                                     Name</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-user text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="text" id="middle_name" name="middle_name"
                                         value="{{ old('middle_name') }}"
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="David">
                                 </div>
                                 @error('middle_name')
                                     <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                 @enderror
                             </div>

                             <!-- Last Name -->
                             <div class="space-y-1">
                                 <label for="last_name"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Last Name
                                     *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-user text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="text" id="last_name" name="last_name"
                                         value="{{ old('last_name') }}"
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="Smith" required>
                                 </div>
                                 @error('last_name')
                                     <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                 @enderror
                             </div>

                             <!-- Username -->
                             <div class="space-y-1">
                                 <label for="username"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Username
                                     *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-at text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="text" id="username" name="username"
                                         value="{{ old('username') }}"
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="johnsmith123" required>
                                 </div>
                                 @error('username')
                                     <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                 @enderror
                             </div>
                         </div>
                     </div>

                     <!-- Step 2: Contact Information -->
                     <div id="step-2" class="step-content" style="display: none;">
                         <div class="text-center mb-4">
                             <div
                                 class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary-100/50 dark:bg-primary-800/50 backdrop-blur-sm mb-3">
                                 <i class="fas fa-envelope text-lg text-primary-600 dark:text-primary-300"></i>
                             </div>
                             <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-1">Contact Information
                             </h3>
                             <p class="text-xs text-gray-600 dark:text-gray-400">How can we reach you?</p>
                         </div>

                         <div class="space-y-3">
                             <!-- Email -->
                             <div class="space-y-1">
                                 <label for="email"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Email
                                     Address *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-envelope text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="email" id="email" name="email"
                                         value="{{ old('email') }}"
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="john@example.com" required>
                                 </div>
                                 @error('email')
                                     <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                 @enderror
                             </div>

                             <!-- Phone -->
                             <div class="space-y-1">
                                 <label for="phone"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Phone
                                     Number *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-phone text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="tel" id="phone" name="phone"
                                         value="{{ old('phone') }}"
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="+1 (234) 567-8901" required>
                                 </div>
                                 @error('phone')
                                     <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                 @enderror
                             </div>

                             <!-- Country -->
                             <div class="space-y-1">
                                 <label for="country"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Country
                                     *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-globe text-gray-400 text-sm"></i>
                                     </div>
                                     <select id="country" name="country"
                                         class="w-full pl-10 pr-8 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm appearance-none"
                                         required>
                                         <option value="" disabled selected>Select Country</option>
                                         @foreach (config('setting.countries') as $key => $country)
                                             <option value="{{ $country }}" @selected(old('country') == $country)>
                                                 {{ $country }}
                                             </option>
                                         @endforeach
                                     </select>
                                     @error('country')
                                         <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                     @enderror
                                     <div
                                         class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                         <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Step 3: Account Setup -->
                     <div id="step-3" class="step-content" style="display: none;">
                         <div class="text-center mb-4">
                             <div
                                 class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary-100/50 dark:bg-primary-800/50 backdrop-blur-sm mb-3">
                                 <i class="fas fa-university text-lg text-primary-600 dark:text-primary-300"></i>
                             </div>
                             <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-1">Account Setup</h3>
                             <p class="text-xs text-gray-600 dark:text-gray-400">Choose your account preferences</p>
                         </div>

                         <div class="space-y-3">
                             <!-- Currency -->
                             <div class="space-y-1">
                                 <label for="currency"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Currency
                                     *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-dollar-sign text-gray-400 text-sm"></i>
                                     </div>
                                     <select id="currency" name="currency"
                                         class="w-full pl-10 pr-8 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm appearance-none"
                                         required>
                                         <option value="" disabled selected>Select Currency</option>
                                         @foreach (config('setting.currencies') as $key => $currency)
                                             <option
                                                 value="{{ $currency['name'] }}-{{ $currency['code'] }}-{{ $currency['symbol'] }}"
                                                 {{ old('currency') == $currency['name'] . '-' . $currency['code'] . '-' . $currency['symbol'] ? 'selected' : '' }}>
                                                 {{ $currency['name'] }}</option>
                                         @endforeach
                                     </select>
                                     @error('currency')
                                         <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                     @enderror
                                     <div
                                         class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                         <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                                     </div>
                                 </div>
                             </div>

                             <!-- Account Type -->
                             <div class="space-y-1">
                                 <label for="account_type"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Account
                                     Type *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-university text-gray-400 text-sm"></i>
                                     </div>
                                     <select id="account_type" name="account_type"
                                         class="w-full pl-10 pr-8 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm appearance-none"
                                         required>
                                         <option value="" disabled selected>Select Account Type</option>
                                         @foreach (config('setting.accountTypes') as $accountType)
                                             <option value="{{ $accountType }}" @selected(old('account_type') == $accountType)>
                                                 {{ $accountType }}</option>
                                         @endforeach
                                     </select>
                                     @error('account_type')
                                         <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                     @enderror
                                     <div
                                         class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                         <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                                     </div>
                                 </div>
                             </div>

                             <!-- Transaction PIN -->
                             <div class="space-y-1">
                                 <label for="transaction_pin"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Transaction
                                     PIN *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-key text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="password" id="transaction_pin" name="transaction_pin"
                                         class="w-full pl-10 pr-12 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="4-digit PIN" maxlength="4" required>
                                     <button type="button" onclick="togglePassword('transaction_pin')"
                                         class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-primary-500 transition-colors">
                                         <i class="fas fa-eye text-sm" id="pin-eye"></i>
                                     </button>
                                 </div>
                                 @error('transaction_pin')
                                     <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                 @enderror
                             </div>
                         </div>
                     </div>

                     <!-- Step 4: Security -->
                     <div id="step-4" class="step-content" style="display: none;">
                         <div class="text-center mb-4">
                             <div
                                 class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary-100/50 dark:bg-primary-800/50 backdrop-blur-sm mb-3">
                                 <i class="fas fa-lock text-lg text-primary-600 dark:text-primary-300"></i>
                             </div>
                             <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-1">Security Setup</h3>
                             <p class="text-xs text-gray-600 dark:text-gray-400">Secure your account</p>
                         </div>

                         <div class="space-y-3">
                             <!-- Password -->
                             <div class="space-y-1">
                                 <label for="password"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Password
                                     *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-lock text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="password" id="password" name="password"
                                         class="w-full pl-10 pr-12 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="Create strong password" required>
                                     <button type="button" onclick="togglePassword('password')"
                                         class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-primary-500 transition-colors">
                                         <i class="fas fa-eye text-sm" id="password-eye"></i>
                                     </button>
                                 </div>
                             </div>

                             <!-- Confirm Password -->
                             <div class="space-y-1">
                                 <label for="password_confirmation"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Confirm
                                     Password *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-lock text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="password" id="password_confirmation" name="password_confirmation"
                                         class="w-full pl-10 pr-12 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="Confirm your password" required>
                                     <button type="button" onclick="togglePassword('password_confirmation')"
                                         class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-primary-500 transition-colors">
                                         <i class="fas fa-eye text-sm" id="password_confirmation-eye"></i>
                                     </button>
                                 </div>
                             </div>

                             <!-- Terms and Conditions -->
                             <div class="flex items-start space-x-2 pt-1">
                                 <input type="checkbox" id="terms" name="terms"
                                     class="mt-1 w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 focus:ring-2"
                                     required>
                                 <label for="terms"
                                     class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed">
                                     I agree to the <a href="{{ route('term_of_service') }}"
                                         class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-medium">Terms
                                         of Service</a> and <a href="{{ route('privacy_policy') }}"
                                         class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-medium">Privacy
                                         Policy</a>
                                 </label>
                             </div>
                         </div>
                     </div>

                     <!-- Hidden Currency Symbol Field -->
                     <input type="hidden" name="s_curr" id="s_curr">

                     <!-- Navigation Buttons -->
                     <div class="flex justify-between pt-4">
                         <button type="button" id="prev-btn"
                             class="px-4 py-3 bg-gray-100/90 dark:bg-gray-700/90 hover:bg-gray-200/90 dark:hover:bg-gray-600/90 text-gray-800 dark:text-gray-200 font-medium rounded-xl transition-all duration-300 flex items-center group text-sm backdrop-blur-sm border border-gray-200/50 dark:border-gray-600/50"
                             style="display: none;">
                             <i
                                 class="fas fa-chevron-left mr-2 group-hover:-translate-x-1 transition-transform text-sm"></i>
                             Previous
                         </button>

                         <button type="button" id="next-btn"
                             class="ml-auto px-4 py-3 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 dark:from-primary-700 dark:to-primary-800 dark:hover:from-primary-600 dark:hover:to-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center group text-sm">
                             Next
                             <i
                                 class="fas fa-chevron-right ml-2 group-hover:translate-x-1 transition-transform text-sm"></i>
                         </button>

                         <button type="submit" id="submit-btn"
                             class="ml-auto px-4 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center group text-sm"
                             style="display: none;">
                             <i
                                 class="fas fa-user-plus mr-2 group-hover:translate-x-1 transition-transform text-sm"></i>
                             Create Account
                         </button>
                     </div>
                 </form>

                 <!-- Login Link -->
                 <div class="mt-6 text-center">
                     <p class="text-sm text-gray-600 dark:text-gray-400">
                         Already have an account?
                         <a href="{{ route('login') }}"
                             class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-semibold transition-colors">
                             Sign In
                         </a>
                     </p>
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
 </div>
