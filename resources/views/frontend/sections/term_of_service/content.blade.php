 <!-- Terms Content -->
 <section class="py-16 bg-white dark:bg-gray-900">
     <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 lg:p-12">
             <div class="prose prose-lg dark:prose-invert max-w-none">
                 <h2>1. Acceptance of Terms</h2>
                 <p>By accessing and using {{ config('app.name') }} banking services, you accept and agree to be bound
                     by the terms and provision of this agreement.</p>

                 <h2>2. Account Opening and Maintenance</h2>
                 <p>To open an account with {{ config('app.name') }}, you must:</p>
                 <ul>
                     <li>Be at least 18 years of age</li>
                     <li>Provide accurate and complete information</li>
                     <li>Maintain the security of your account credentials</li>
                     <li>Comply with all applicable laws and regulations</li>
                 </ul>

                 <h2>3. Account Security</h2>
                 <p>You are responsible for maintaining the confidentiality of your account information and password.
                     You
                     agree to notify us immediately of any unauthorized use of your account.</p>

                 <h2>4. Services and Fees</h2>
                 <p>{{ config('app.name') }} provides various banking services including but not limited to:</p>
                 <ul>
                     <li>Savings and checking accounts</li>
                     <li>Online and mobile banking</li>
                     <li>Loan services</li>
                     <li>Investment products</li>
                     <li>Credit cards</li>
                 </ul>

                 <h2>5. Privacy and Data Protection</h2>
                 <p>We are committed to protecting your privacy and personal information. Please review our Privacy
                     Policy for detailed information about how we collect, use, and protect your data.</p>

                 <h2>6. Electronic Communications</h2>
                 <p>By using our services, you consent to receive communications from us electronically, including
                     account statements, notices, and other disclosures.</p>

                 <h2>7. Limitation of Liability</h2>
                 <p>{{ config('app.name') }} shall not be liable for any indirect, incidental, special, consequential,
                     or punitive damages arising from your use of our services.</p>

                 <h2>8. Modifications to Terms</h2>
                 <p>We reserve the right to modify these terms at any time. We will notify you of any changes by posting
                     the new terms on our website.</p>

                 <h2>9. Governing Law</h2>
                 <p>These terms shall be governed by and construed in accordance with the laws of the jurisdiction in
                     which {{ config('app.name') }} operates.</p>

                 <h2>10. Contact Information</h2>
                 <p>If you have any questions about these Terms of Service, please contact us at:</p>
                 <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg mt-4">
                     <p class="mb-2"><strong>Privacy Officer</strong></p>
                     <p class="mb-2"><strong>Email:</strong> {{ config('app.email') }}</p>
                     @if (config('app.phone'))
                         <p class="mb-2"><strong>Phone:</strong> {{ config('app.phone') }}</p>
                     @endif
                     @if (config('app.address'))
                         <p><strong>Address:</strong> {{ config('app.address') }}</p>
                     @endif
                 </div>

                 <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                     <p class="text-sm text-gray-600 dark:text-gray-400">
                         Last updated: {{ date('F j, Y') }}
                     </p>
                 </div>
             </div>
         </div>
     </div>
 </section>
