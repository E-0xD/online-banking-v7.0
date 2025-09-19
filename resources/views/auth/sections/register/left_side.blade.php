 <!-- Left Side - Branding & Illustration (Desktop Only) -->
 <div
     class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 dark:from-primary-700 dark:via-primary-800 dark:to-primary-900 relative overflow-hidden">
     <!-- Animated Background Elements -->
     <div class="absolute inset-0 overflow-hidden">
         <!-- Floating Shapes -->
         <div class="absolute top-1/4 left-1/4 w-48 h-48 bg-white/10 rounded-full backdrop-blur-sm floating-slow">
         </div>
         <div class="absolute bottom-1/3 right-1/4 w-72 h-72 bg-white/5 rounded-full backdrop-blur-sm floating"></div>
         <div class="absolute top-2/3 left-1/3 w-32 h-32 bg-white/15 rounded-full backdrop-blur-sm floating-slower">
         </div>

         <!-- Grid Pattern -->
         <div class="absolute inset-0 opacity-20"
             style="background-image: radial-gradient(rgba(255,255,255,0.15) 1px, transparent 1px); background-size: 25px 25px;">
         </div>
     </div>

     <!-- Content -->
     <div class="relative flex flex-col justify-center items-center w-full h-full text-white p-8 z-10">
         <!-- Logo with Glow Effect -->
         <div class="mb-6 relative">
             <div class="absolute inset-0 bg-white/20 rounded-2xl blur-lg"></div>
             <div class="relative bg-white/10 backdrop-blur-sm rounded-2xl p-4 border border-white/20">
                 <img src="{{ asset(config('app.assets.logo')) }}" alt="Logo" class="h-12">
             </div>
         </div>

         <!-- Title -->
         <h1
             class="text-3xl font-black mb-3 text-center bg-gradient-to-r from-white via-white to-white/80 bg-clip-text text-transparent">
             Join {{ config('app.name') }}
         </h1>
         <h2 class="text-lg font-semibold mb-6 text-center text-white/90">
             Create Your Banking Account
         </h2>

         <!-- Description -->
         <p class="text-sm mb-8 max-w-md text-center text-white/80 leading-relaxed">
             Start your financial journey with {{ config('app.name') }}. Secure, fast, and reliable banking at your
             fingertips.
         </p>

         <!-- Features Grid -->
         <div class="grid grid-cols-2 gap-4 w-full max-w-md">
             <div
                 class="group flex items-center space-x-3 p-3 rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/15 transition-all duration-300">
                 <div
                     class="flex-shrink-0 w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                     <i class="fas fa-shield-alt text-sm"></i>
                 </div>
                 <div>
                     <h3 class="text-sm font-semibold">Secure Platform</h3>
                     <p class="text-xs text-white/70">Bank-grade security</p>
                 </div>
             </div>
             <div
                 class="group flex items-center space-x-3 p-3 rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/15 transition-all duration-300">
                 <div
                     class="flex-shrink-0 w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                     <i class="fas fa-bolt text-sm"></i>
                 </div>
                 <div>
                     <h3 class="text-sm font-semibold">Fast Transfers</h3>
                     <p class="text-xs text-white/70">Instant payments</p>
                 </div>
             </div>
             <div
                 class="group flex items-center space-x-3 p-3 rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/15 transition-all duration-300">
                 <div
                     class="flex-shrink-0 w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                     <i class="fas fa-clock text-sm"></i>
                 </div>
                 <div>
                     <h3 class="text-sm font-semibold">24/7 Access</h3>
                     <p class="text-xs text-white/70">Always available</p>
                 </div>
             </div>
             <div
                 class="group flex items-center space-x-3 p-3 rounded-xl bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/15 transition-all duration-300">
                 <div
                     class="flex-shrink-0 w-8 h-8 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                     <i class="fas fa-globe text-sm"></i>
                 </div>
                 <div>
                     <h3 class="text-sm font-semibold">Global Banking</h3>
                     <p class="text-xs text-white/70">Worldwide access</p>
                 </div>
             </div>
         </div>
     </div>
 </div>
