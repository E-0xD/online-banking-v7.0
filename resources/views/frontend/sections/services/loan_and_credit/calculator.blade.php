 <!-- Loan Calculator Section -->
 <section class="py-16 bg-gray-50 dark:bg-gray-800">
     <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="text-center mb-12">
             <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                 Loan Calculator
             </h2>
             <p class="text-lg text-gray-600 dark:text-gray-300">
                 Estimate your monthly payments with our loan calculator
             </p>
         </div>

         <div class="bg-white dark:bg-gray-900 rounded-2xl p-8 shadow-xl">
             <div class="grid md:grid-cols-2 gap-8">
                 <div class="space-y-6">
                     <div>
                         <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Loan
                             Amount</label>
                         <input type="number" id="loanAmount" placeholder="$25,000"
                             class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                     </div>
                     <div>
                         <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Interest Rate
                             (%)</label>
                         <input type="number" id="interestRate" placeholder="5.99" step="0.01"
                             class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                     </div>
                     <div>
                         <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Loan Term
                             (years)</label>
                         <input type="number" id="loanTerm" placeholder="5"
                             class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white">
                     </div>
                     <button onclick="calculateLoan()"
                         class="w-full bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-6 rounded-xl transition-colors">
                         Calculate Payment
                     </button>
                 </div>
                 <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-6">
                     <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Payment Breakdown</h3>
                     <div class="space-y-3">
                         <div class="flex justify-between">
                             <span class="text-gray-600 dark:text-gray-300">Monthly Payment:</span>
                             <span id="monthlyPayment"
                                 class="font-bold text-primary-600 dark:text-primary-400">$0</span>
                         </div>
                         <div class="flex justify-between">
                             <span class="text-gray-600 dark:text-gray-300">Total Interest:</span>
                             <span id="totalInterest" class="font-bold text-gray-900 dark:text-white">$0</span>
                         </div>
                         <div class="flex justify-between">
                             <span class="text-gray-600 dark:text-gray-300">Total Payment:</span>
                             <span id="totalPayment" class="font-bold text-gray-900 dark:text-white">$0</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
