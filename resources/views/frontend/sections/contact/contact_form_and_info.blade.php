 <!-- Contact Form & Info Section -->
 <section class="py-16 bg-white dark:bg-gray-900">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="grid lg:grid-cols-2 gap-12">
             <!-- Contact Form -->
             <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-8">
                 <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Send us a Message</h2>

                 <form action="https://firsttruistcus.com/homesendcontact" method="POST" class="space-y-6">
                     <input type="hidden" name="_token" value="3GLYtLNj0mU7CAjVDGsvmdGAF6oicfxkHyfnLTKA">
                     <div class="grid md:grid-cols-2 gap-6">
                         <div>
                             <label for="name"
                                 class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Full
                                 Name</label>
                             <input type="text" id="name" name="name" required
                                 class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                         </div>
                         <div>
                             <label for="email"
                                 class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email
                                 Address</label>
                             <input type="email" id="email" name="email" required
                                 class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                         </div>
                     </div>

                     <div>
                         <label for="subject"
                             class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject</label>
                         <input type="text" id="subject" name="subject" required
                             class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                     </div>

                     <div>
                         <label for="message"
                             class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                         <textarea id="message" name="message" rows="6" required
                             class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
                     </div>

                     <button type="submit"
                         class="w-full bg-primary-600 hover:bg-primary-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                         <i class="fa-solid fa-paper-plane mr-2"></i>
                         Send Message
                     </button>
                 </form>
             </div>

             <!-- Contact Information -->
             <div class="space-y-8">
                 <div>
                     <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Get in Touch</h2>
                     <p class="text-gray-600 dark:text-gray-300 mb-8">
                         Have questions about our services? Need help with your account? Our team is ready to assist
                         you.
                     </p>
                 </div>

                 <div class="space-y-6">
                     @if (config('app.phone'))
                         <!-- Phone -->
                         <div class="flex items-start space-x-4">
                             <div
                                 class="w-12 h-12 bg-primary-100 dark:bg-primary-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                                 <i class="fa-solid fa-phone text-primary-600 dark:text-primary-400"></i>
                             </div>
                             <div>
                                 <h3 class="font-semibold text-gray-900 dark:text-white mb-1">Phone</h3>
                                 <p class="text-gray-600 dark:text-gray-300">{{ config('app.phone') }}</p>
                                 <p class="text-sm text-gray-500 dark:text-gray-400">Available 24/7</p>
                             </div>
                         </div>
                     @endif

                     <!-- Email -->
                     <div class="flex items-start space-x-4">
                         <div
                             class="w-12 h-12 bg-teal-100 dark:bg-teal-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                             <i class="fa-solid fa-envelope text-teal-600 dark:text-teal-400"></i>
                         </div>
                         <div>
                             <h3 class="font-semibold text-gray-900 dark:text-white mb-1">Email</h3>
                             <p class="text-gray-600 dark:text-gray-300">{{ config('app.email') }}</p>
                             <p class="text-sm text-gray-500 dark:text-gray-400">Response within 24 hours</p>
                         </div>
                     </div>

                     <!-- Address -->
                     <div class="flex items-start space-x-4">
                         <div
                             class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                             <i class="fa-solid fa-map-marker-alt text-purple-600 dark:text-purple-400"></i>
                         </div>
                         <div>
                             <h3 class="font-semibold text-gray-900 dark:text-white mb-1">Visit Us</h3>
                             <p class="text-gray-600 dark:text-gray-300">
                                 {{ config('app.address') }}
                             </p>
                         </div>
                     </div>

                     <!-- Hours -->
                     <div class="flex items-start space-x-4">
                         <div
                             class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-xl flex items-center justify-center flex-shrink-0">
                             <i class="fa-solid fa-clock text-orange-600 dark:text-orange-400"></i>
                         </div>
                         <div>
                             <h3 class="font-semibold text-gray-900 dark:text-white mb-1">Banking Hours</h3>
                             <p class="text-gray-600 dark:text-gray-300">
                                 Mon-Fri: 9AM-5PM<br>
                                 Sat: 9AM-1PM<br>
                                 Sun: Closed
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
