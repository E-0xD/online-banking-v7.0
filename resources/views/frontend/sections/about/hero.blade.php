 <!-- About Hero Section -->
 <section
     class="relative py-16 lg:py-20 bg-gradient-to-br from-slate-900 via-primary-900 to-gray-900 dark:from-gray-900 dark:via-primary-900 dark:to-black overflow-hidden">
     <!-- Background Effects -->
     <div class="absolute inset-0">
         <div class="absolute inset-0 opacity-10">
             <div class="absolute top-0 left-0 w-full h-full"
                 style="background-image: radial-gradient(circle at 25% 25%, #ffffff 1px, transparent 1px), radial-gradient(circle at 75% 75%, #ffffff 1px, transparent 1px); background-size: 60px 60px; animation: float 20s ease-in-out infinite;">
             </div>
         </div>
         <div class="absolute top-20 left-20 w-96 h-96 bg-primary-500/20 rounded-full blur-3xl animate-pulse"></div>
         <div
             class="absolute bottom-20 right-20 w-80 h-80 bg-teal-500/20 rounded-full blur-3xl animate-pulse delay-1000">
         </div>
     </div>

     <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="text-center mb-12">
             <div
                 class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm text-white/90 rounded-full text-sm font-semibold mb-6 border border-white/20">
                 <i class="fa-solid fa-building-columns mr-2"></i>
                 Our Story
             </div>
             <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4">
                 About {{ config('app.name') }}
             </h1>
             <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                 Trusted banking partner committed to your financial success since our founding
             </p>
         </div>
     </div>
 </section>
