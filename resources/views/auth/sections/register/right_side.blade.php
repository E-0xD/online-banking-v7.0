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
                                     <input type="text" id="name" name="name" value=""
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="John" required>
                                 </div>
                             </div>

                             <!-- Last Name -->
                             <div class="space-y-1">
                                 <label for="lastname"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Last Name
                                     *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-user text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="text" id="lastname" name="lastname" value=""
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="Smith" required>
                                 </div>
                             </div>

                             <!-- Middle Name -->
                             <div class="space-y-1">
                                 <label for="middlename"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Middle
                                     Name</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-user text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="text" id="middlename" name="middlename" value=""
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="David">
                                 </div>
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
                                     <input type="text" id="username" name="username" value=""
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="johnsmith123" required>
                                 </div>
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
                                     <input type="email" id="email" name="email" value=""
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="john@example.com" required>
                                 </div>
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
                                     <input type="tel" id="phone" name="phone" value=""
                                         class="w-full pl-10 pr-3 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="+1 (234) 567-8901" required>
                                 </div>
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
                                         <option value="Afganistan">Afghanistan</option>
                                         <option value="Albania">Albania</option>
                                         <option value="Algeria">Algeria</option>
                                         <option value="American Samoa">American Samoa</option>
                                         <option value="Andorra">Andorra</option>
                                         <option value="Angola">Angola</option>
                                         <option value="Anguilla">Anguilla</option>
                                         <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                         <option value="Argentina">Argentina</option>
                                         <option value="Armenia">Armenia</option>
                                         <option value="Aruba">Aruba</option>
                                         <option value="Australia">Australia</option>
                                         <option value="Austria">Austria</option>
                                         <option value="Azerbaijan">Azerbaijan</option>
                                         <option value="Bahamas">Bahamas</option>
                                         <option value="Bahrain">Bahrain</option>
                                         <option value="Bangladesh">Bangladesh</option>
                                         <option value="Barbados">Barbados</option>
                                         <option value="Belarus">Belarus</option>
                                         <option value="Belgium">Belgium</option>
                                         <option value="Belize">Belize</option>
                                         <option value="Benin">Benin</option>
                                         <option value="Bermuda">Bermuda</option>
                                         <option value="Bhutan">Bhutan</option>
                                         <option value="Bolivia">Bolivia</option>
                                         <option value="Bonaire">Bonaire</option>
                                         <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                         <option value="Botswana">Botswana</option>
                                         <option value="Brazil">Brazil</option>
                                         <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                         <option value="Brunei">Brunei</option>
                                         <option value="Bulgaria">Bulgaria</option>
                                         <option value="Burkina Faso">Burkina Faso</option>
                                         <option value="Burundi">Burundi</option>
                                         <option value="Cambodia">Cambodia</option>
                                         <option value="Cameroon">Cameroon</option>
                                         <option value="Canada">Canada</option>
                                         <option value="Canary Islands">Canary Islands</option>
                                         <option value="Cape Verde">Cape Verde</option>
                                         <option value="Cayman Islands">Cayman Islands</option>
                                         <option value="Central African Republic">Central African Republic</option>
                                         <option value="Chad">Chad</option>
                                         <option value="Channel Islands">Channel Islands</option>
                                         <option value="Chile">Chile</option>
                                         <option value="China">China</option>
                                         <option value="Christmas Island">Christmas Island</option>
                                         <option value="Cocos Island">Cocos Island</option>
                                         <option value="Colombia">Colombia</option>
                                         <option value="Comoros">Comoros</option>
                                         <option value="Congo">Congo</option>
                                         <option value="Cook Islands">Cook Islands</option>
                                         <option value="Costa Rica">Costa Rica</option>
                                         <option value="Cote DIvoire">Cote D'Ivoire</option>
                                         <option value="Croatia">Croatia</option>
                                         <option value="Cuba">Cuba</option>
                                         <option value="Curaco">Curacao</option>
                                         <option value="Cyprus">Cyprus</option>
                                         <option value="Czech Republic">Czech Republic</option>
                                         <option value="Denmark">Denmark</option>
                                         <option value="Djibouti">Djibouti</option>
                                         <option value="Dominica">Dominica</option>
                                         <option value="Dominican Republic">Dominican Republic</option>
                                         <option value="East Timor">East Timor</option>
                                         <option value="Ecuador">Ecuador</option>
                                         <option value="Egypt">Egypt</option>
                                         <option value="El Salvador">El Salvador</option>
                                         <option value="Equatorial Guinea">Equatorial Guinea</option>
                                         <option value="Eritrea">Eritrea</option>
                                         <option value="Estonia">Estonia</option>
                                         <option value="Ethiopia">Ethiopia</option>
                                         <option value="Falkland Islands">Falkland Islands</option>
                                         <option value="Faroe Islands">Faroe Islands</option>
                                         <option value="Fiji">Fiji</option>
                                         <option value="Finland">Finland</option>
                                         <option value="France">France</option>
                                         <option value="French Guiana">French Guiana</option>
                                         <option value="French Polynesia">French Polynesia</option>
                                         <option value="French Southern Ter">French Southern Ter</option>
                                         <option value="Gabon">Gabon</option>
                                         <option value="Gambia">Gambia</option>
                                         <option value="Georgia">Georgia</option>
                                         <option value="Germany">Germany</option>
                                         <option value="Ghana">Ghana</option>
                                         <option value="Gibraltar">Gibraltar</option>
                                         <option value="Great Britain">Great Britain</option>
                                         <option value="Greece">Greece</option>
                                         <option value="Greenland">Greenland</option>
                                         <option value="Grenada">Grenada</option>
                                         <option value="Guadeloupe">Guadeloupe</option>
                                         <option value="Guam">Guam</option>
                                         <option value="Guatemala">Guatemala</option>
                                         <option value="Guinea">Guinea</option>
                                         <option value="Guyana">Guyana</option>
                                         <option value="Haiti">Haiti</option>
                                         <option value="Hawaii">Hawaii</option>
                                         <option value="Honduras">Honduras</option>
                                         <option value="Hong Kong">Hong Kong</option>
                                         <option value="Hungary">Hungary</option>
                                         <option value="Iceland">Iceland</option>
                                         <option value="India">India</option>
                                         <option value="Indonesia">Indonesia</option>
                                         <option value="Iran">Iran</option>
                                         <option value="Iraq">Iraq</option>
                                         <option value="Ireland">Ireland</option>
                                         <option value="Isle of Man">Isle of Man</option>
                                         <option value="Israel">Israel</option>
                                         <option value="Italy">Italy</option>
                                         <option value="Jamaica">Jamaica</option>
                                         <option value="Japan">Japan</option>
                                         <option value="Jordan">Jordan</option>
                                         <option value="Kazakhstan">Kazakhstan</option>
                                         <option value="Kenya">Kenya</option>
                                         <option value="Kiribati">Kiribati</option>
                                         <option value="Korea North">Korea North</option>
                                         <option value="Korea Sout">Korea South</option>
                                         <option value="Kuwait">Kuwait</option>
                                         <option value="Kyrgyzstan">Kyrgyzstan</option>
                                         <option value="Laos">Laos</option>
                                         <option value="Latvia">Latvia</option>
                                         <option value="Lebanon">Lebanon</option>
                                         <option value="Lesotho">Lesotho</option>
                                         <option value="Liberia">Liberia</option>
                                         <option value="Libya">Libya</option>
                                         <option value="Liechtenstein">Liechtenstein</option>
                                         <option value="Lithuania">Lithuania</option>
                                         <option value="Luxembourg">Luxembourg</option>
                                         <option value="Macau">Macau</option>
                                         <option value="Macedonia">Macedonia</option>
                                         <option value="Madagascar">Madagascar</option>
                                         <option value="Malaysia">Malaysia</option>
                                         <option value="Malawi">Malawi</option>
                                         <option value="Maldives">Maldives</option>
                                         <option value="Mali">Mali</option>
                                         <option value="Malta">Malta</option>
                                         <option value="Marshall Islands">Marshall Islands</option>
                                         <option value="Martinique">Martinique</option>
                                         <option value="Mauritania">Mauritania</option>
                                         <option value="Mauritius">Mauritius</option>
                                         <option value="Mayotte">Mayotte</option>
                                         <option value="Mexico">Mexico</option>
                                         <option value="Midway Islands">Midway Islands</option>
                                         <option value="Moldova">Moldova</option>
                                         <option value="Monaco">Monaco</option>
                                         <option value="Mongolia">Mongolia</option>
                                         <option value="Montserrat">Montserrat</option>
                                         <option value="Morocco">Morocco</option>
                                         <option value="Mozambique">Mozambique</option>
                                         <option value="Myanmar">Myanmar</option>
                                         <option value="Nambia">Nambia</option>
                                         <option value="Nauru">Nauru</option>
                                         <option value="Nepal">Nepal</option>
                                         <option value="Netherland Antilles">Netherland Antilles</option>
                                         <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                         <option value="Nevis">Nevis</option>
                                         <option value="New Caledonia">New Caledonia</option>
                                         <option value="New Zealand">New Zealand</option>
                                         <option value="Nicaragua">Nicaragua</option>
                                         <option value="Niger">Niger</option>
                                         <option value="Nigeria">Nigeria</option>
                                         <option value="Niue">Niue</option>
                                         <option value="Norfolk Island">Norfolk Island</option>
                                         <option value="Norway">Norway</option>
                                         <option value="Oman">Oman</option>
                                         <option value="Pakistan">Pakistan</option>
                                         <option value="Palau Island">Palau Island</option>
                                         <option value="Palestine">Palestine</option>
                                         <option value="Panama">Panama</option>
                                         <option value="Papua New Guinea">Papua New Guinea</option>
                                         <option value="Paraguay">Paraguay</option>
                                         <option value="Peru">Peru</option>
                                         <option value="Phillipines">Philippines</option>
                                         <option value="Pitcairn Island">Pitcairn Island</option>
                                         <option value="Poland">Poland</option>
                                         <option value="Portugal">Portugal</option>
                                         <option value="Puerto Rico">Puerto Rico</option>
                                         <option value="Qatar">Qatar</option>
                                         <option value="Republic of Montenegro">Republic of Montenegro</option>
                                         <option value="Republic of Serbia">Republic of Serbia</option>
                                         <option value="Reunion">Reunion</option>
                                         <option value="Romania">Romania</option>
                                         <option value="Russia">Russia</option>
                                         <option value="Rwanda">Rwanda</option>
                                         <option value="St Barthelemy">St Barthelemy</option>
                                         <option value="St Eustatius">St Eustatius</option>
                                         <option value="St Helena">St Helena</option>
                                         <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                         <option value="St Lucia">St Lucia</option>
                                         <option value="St Maarten">St Maarten</option>
                                         <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                         <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines
                                         </option>
                                         <option value="Saipan">Saipan</option>
                                         <option value="Samoa">Samoa</option>
                                         <option value="Samoa American">Samoa American</option>
                                         <option value="San Marino">San Marino</option>
                                         <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                         <option value="Saudi Arabia">Saudi Arabia</option>
                                         <option value="Senegal">Senegal</option>
                                         <option value="Serbia">Serbia</option>
                                         <option value="Seychelles">Seychelles</option>
                                         <option value="Sierra Leone">Sierra Leone</option>
                                         <option value="Singapore">Singapore</option>
                                         <option value="Slovakia">Slovakia</option>
                                         <option value="Slovenia">Slovenia</option>
                                         <option value="Solomon Islands">Solomon Islands</option>
                                         <option value="Somalia">Somalia</option>
                                         <option value="South Africa">South Africa</option>
                                         <option value="Spain">Spain</option>
                                         <option value="Sri Lanka">Sri Lanka</option>
                                         <option value="Sudan">Sudan</option>
                                         <option value="Suriname">Suriname</option>
                                         <option value="Swaziland">Swaziland</option>
                                         <option value="Sweden">Sweden</option>
                                         <option value="Switzerland">Switzerland</option>
                                         <option value="Syria">Syria</option>
                                         <option value="Tahiti">Tahiti</option>
                                         <option value="Taiwan">Taiwan</option>
                                         <option value="Tajikistan">Tajikistan</option>
                                         <option value="Tanzania">Tanzania</option>
                                         <option value="Thailand">Thailand</option>
                                         <option value="Togo">Togo</option>
                                         <option value="Tokelau">Tokelau</option>
                                         <option value="Tonga">Tonga</option>
                                         <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                         <option value="Tunisia">Tunisia</option>
                                         <option value="Turkey">Turkey</option>
                                         <option value="Turkmenistan">Turkmenistan</option>
                                         <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                         <option value="Tuvalu">Tuvalu</option>
                                         <option value="Uganda">Uganda</option>
                                         <option value="Ukraine">Ukraine</option>
                                         <option value="United Arab Erimates">United Arab Emirates</option>
                                         <option value="United Kingdom">United Kingdom</option>
                                         <option value="United States of America">United States of America</option>
                                         <option value="Uraguay">Uruguay</option>
                                         <option value="Uzbekistan">Uzbekistan</option>
                                         <option value="Vanuatu">Vanuatu</option>
                                         <option value="Vatican City State">Vatican City State</option>
                                         <option value="Venezuela">Venezuela</option>
                                         <option value="Vietnam">Vietnam</option>
                                         <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                         <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                         <option value="Wake Island">Wake Island</option>
                                         <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                         <option value="Yemen">Yemen</option>
                                         <option value="Zaire">Zaire</option>
                                         <option value="Zambia">Zambia</option>
                                         <option value="Zimbabwe">Zimbabwe</option>
                                     </select>
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
                                 <label for="curr"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Currency
                                     *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-dollar-sign text-gray-400 text-sm"></i>
                                     </div>
                                     <select id="curr" name="curr"
                                         class="w-full pl-10 pr-8 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm appearance-none"
                                         required>
                                         <option value="" disabled selected>Select Currency</option>
                                         <option value="AED" data-symbol="&#1583;.&#1573;">AED - د.إ</option>
                                         <option value="AFN" data-symbol="&#65;&#102;">AFN - Af</option>
                                         <option value="ALL" data-symbol="&#76;&#101;&#107;">ALL - Lek</option>
                                         <option value="ANG" data-symbol="&#402;">ANG - ƒ</option>
                                         <option value="AOA" data-symbol="&#75;&#122;">AOA - Kz</option>
                                         <option value="ARS" data-symbol="&#36;">ARS - $</option>
                                         <option value="AUD" data-symbol="&#36;">AUD - $</option>
                                         <option value="AWG" data-symbol="&#402;">AWG - ƒ</option>
                                         <option value="AZN" data-symbol="&#1084;&#1072;&#1085;">AZN - ман
                                         </option>
                                         <option value="BAM" data-symbol="&#75;&#77;">BAM - KM</option>
                                         <option value="BBD" data-symbol="&#36;">BBD - $</option>
                                         <option value="BDT" data-symbol="&#2547;">BDT - ৳</option>
                                         <option value="BGN" data-symbol="&#1083;&#1074;">BGN - лв</option>
                                         <option value="BHD" data-symbol=".&#1583;.&#1576;">BHD - .د.ب</option>
                                         <option value="BIF" data-symbol="&#70;&#66;&#117;">BIF - FBu</option>
                                         <option value="BMD" data-symbol="&#36;">BMD - $</option>
                                         <option value="BND" data-symbol="&#36;">BND - $</option>
                                         <option value="BOB" data-symbol="&#36;&#98;">BOB - $b</option>
                                         <option value="BRL" data-symbol="&#82;&#36;">BRL - R$</option>
                                         <option value="BTC" data-symbol="BTC">BTC - BTC</option>
                                         <option value="BSD" data-symbol="&#36;">BSD - $</option>
                                         <option value="BTN" data-symbol="&#78;&#117;&#46;">BTN - Nu.</option>
                                         <option value="BWP" data-symbol="&#80;">BWP - P</option>
                                         <option value="BYR" data-symbol="&#112;&#46;">BYR - p.</option>
                                         <option value="BZD" data-symbol="&#66;&#90;&#36;">BZD - BZ$</option>
                                         <option value="CAD" data-symbol="&#36;">CAD - $</option>
                                         <option value="CDF" data-symbol="&#70;&#67;">CDF - FC</option>
                                         <option value="CHF" data-symbol="&#67;&#72;&#70;">CHF - CHF</option>
                                         <option value="CLP" data-symbol="&#36;">CLP - $</option>
                                         <option value="CNY" data-symbol="&#165;">CNY - ¥</option>
                                         <option value="COP" data-symbol="&#36;">COP - $</option>
                                         <option value="CRC" data-symbol="&#8353;">CRC - ₡</option>
                                         <option value="CUP" data-symbol="&#8396;">CUP - ⃌</option>
                                         <option value="CVE" data-symbol="&#36;">CVE - $</option>
                                         <option value="CZK" data-symbol="&#75;&#269;">CZK - Kč</option>
                                         <option value="DJF" data-symbol="&#70;&#100;&#106;">DJF - Fdj</option>
                                         <option value="DKK" data-symbol="&#107;&#114;">DKK - kr</option>
                                         <option value="DOP" data-symbol="&#82;&#68;&#36;">DOP - RD$</option>
                                         <option value="DZD" data-symbol="&#1583;&#1580;">DZD - دج</option>
                                         <option value="EGP" data-symbol="&#163;">EGP - £</option>
                                         <option value="ETB" data-symbol="&#66;&#114;">ETB - Br</option>
                                         <option value="EUR" data-symbol="&#8364;">EUR - €</option>
                                         <option value="ETH" data-symbol="ETH">ETH - ETH</option>
                                         <option value="FJD" data-symbol="&#36;">FJD - $</option>
                                         <option value="FKP" data-symbol="&#163;">FKP - £</option>
                                         <option value="GBP" data-symbol="&#163;">GBP - £</option>
                                         <option value="GEL" data-symbol="&#4314;">GEL - ლ</option>
                                         <option value="GHS" data-symbol="&#162;">GHS - ¢</option>
                                         <option value="GIP" data-symbol="&#163;">GIP - £</option>
                                         <option value="GMD" data-symbol="&#68;">GMD - D</option>
                                         <option value="GNF" data-symbol="&#70;&#71;">GNF - FG</option>
                                         <option value="GTQ" data-symbol="&#81;">GTQ - Q</option>
                                         <option value="GYD" data-symbol="&#36;">GYD - $</option>
                                         <option value="HKD" data-symbol="&#36;">HKD - $</option>
                                         <option value="HNL" data-symbol="&#76;">HNL - L</option>
                                         <option value="HRK" data-symbol="&#107;&#110;">HRK - kn</option>
                                         <option value="HTG" data-symbol="&#71;">HTG - G</option>
                                         <option value="HUF" data-symbol="&#70;&#116;">HUF - Ft</option>
                                         <option value="IDR" data-symbol="&#82;&#112;">IDR - Rp</option>
                                         <option value="ILS" data-symbol="&#8362;">ILS - ₪</option>
                                         <option value="INR" data-symbol="&#8377;">INR - ₹</option>
                                         <option value="IQD" data-symbol="&#1593;.&#1583;">IQD - ع.د</option>
                                         <option value="IRR" data-symbol="&#65020;">IRR - ﷼</option>
                                         <option value="ISK" data-symbol="&#107;&#114;">ISK - kr</option>
                                         <option value="JEP" data-symbol="&#163;">JEP - £</option>
                                         <option value="JMD" data-symbol="&#74;&#36;">JMD - J$</option>
                                         <option value="JOD" data-symbol="&#74;&#68;">JOD - JD</option>
                                         <option value="JPY" data-symbol="&#165;">JPY - ¥</option>
                                         <option value="KES" data-symbol="&#75;&#83;&#104;">KES - KSh</option>
                                         <option value="KGS" data-symbol="&#1083;&#1074;">KGS - лв</option>
                                         <option value="KHR" data-symbol="&#6107;">KHR - ៛</option>
                                         <option value="KMF" data-symbol="&#67;&#70;">KMF - CF</option>
                                         <option value="KPW" data-symbol="&#8361;">KPW - ₩</option>
                                         <option value="KRW" data-symbol="&#8361;">KRW - ₩</option>
                                         <option value="KWD" data-symbol="&#1583;.&#1603;">KWD - د.ك</option>
                                         <option value="KYD" data-symbol="&#36;">KYD - $</option>
                                         <option value="KZT" data-symbol="&#1083;&#1074;">KZT - лв</option>
                                         <option value="LAK" data-symbol="&#8365;">LAK - ₭</option>
                                         <option value="LBP" data-symbol="&#163;">LBP - £</option>
                                         <option value="LKR" data-symbol="&#8360;">LKR - ₨</option>
                                         <option value="LRD" data-symbol="&#36;">LRD - $</option>
                                         <option value="LSL" data-symbol="&#76;">LSL - L</option>
                                         <option value="LTL" data-symbol="&#76;&#116;">LTL - Lt</option>
                                         <option value="LVL" data-symbol="&#76;&#115;">LVL - Ls</option>
                                         <option value="LYD" data-symbol="&#1604;.&#1583;">LYD - ل.د</option>
                                         <option value="MAD" data-symbol="&#1583;.&#1605;.">MAD - د.م.</option>
                                         <option value="MDL" data-symbol="&#76;">MDL - L</option>
                                         <option value="MGA" data-symbol="&#65;&#114;">MGA - Ar</option>
                                         <option value="MKD" data-symbol="&#1076;&#1077;&#1085;">MKD - ден
                                         </option>
                                         <option value="MMK" data-symbol="&#75;">MMK - K</option>
                                         <option value="MNT" data-symbol="&#8366;">MNT - ₮</option>
                                         <option value="MOP" data-symbol="&#77;&#79;&#80;&#36;">MOP - MOP$
                                         </option>
                                         <option value="MRO" data-symbol="&#85;&#77;">MRO - UM</option>
                                         <option value="MUR" data-symbol="&#8360;">MUR - ₨</option>
                                         <option value="MVR" data-symbol=".&#1923;">MVR - .ރ</option>
                                         <option value="MWK" data-symbol="&#77;&#75;">MWK - MK</option>
                                         <option value="MXN" data-symbol="&#36;">MXN - $</option>
                                         <option value="MYR" data-symbol="&#82;&#77;">MYR - RM</option>
                                         <option value="MZN" data-symbol="&#77;&#84;">MZN - MT</option>
                                         <option value="NAD" data-symbol="&#36;">NAD - $</option>
                                         <option value="NGN" data-symbol="&#8358;">NGN - ₦</option>
                                         <option value="NIO" data-symbol="&#67;&#36;">NIO - C$</option>
                                         <option value="NOK" data-symbol="&#107;&#114;">NOK - kr</option>
                                         <option value="NPR" data-symbol="&#8360;">NPR - ₨</option>
                                         <option value="NZD" data-symbol="&#36;">NZD - $</option>
                                         <option value="OMR" data-symbol="&#65020;">OMR - ﷼</option>
                                         <option value="PAB" data-symbol="&#66;&#47;&#46;">PAB - B/.</option>
                                         <option value="PEN" data-symbol="&#83;&#47;&#46;">PEN - S/.</option>
                                         <option value="PGK" data-symbol="&#75;">PGK - K</option>
                                         <option value="PHP" data-symbol="&#8369;">PHP - ₱</option>
                                         <option value="PKR" data-symbol="&#8360;">PKR - ₨</option>
                                         <option value="PLN" data-symbol="&#122;&#322;">PLN - zł</option>
                                         <option value="PYG" data-symbol="&#71;&#115;">PYG - Gs</option>
                                         <option value="QAR" data-symbol="&#65020;">QAR - ﷼</option>
                                         <option value="RON" data-symbol="&#108;&#101;&#105;">RON - lei</option>
                                         <option value="RSD" data-symbol="&#1044;&#1080;&#1085;&#46;">RSD - Дин.
                                         </option>
                                         <option value="RUB" data-symbol="&#1088;&#1091;&#1073;">RUB - руб
                                         </option>
                                         <option value="RWF" data-symbol="&#1585;.&#1587;">RWF - ر.س</option>
                                         <option value="SAR" data-symbol="&#65020;">SAR - ﷼</option>
                                         <option value="SBD" data-symbol="&#36;">SBD - $</option>
                                         <option value="SCR" data-symbol="&#8360;">SCR - ₨</option>
                                         <option value="SDG" data-symbol="&#163;">SDG - £</option>
                                         <option value="SEK" data-symbol="&#107;&#114;">SEK - kr</option>
                                         <option value="SGD" data-symbol="&#36;">SGD - $</option>
                                         <option value="SHP" data-symbol="&#163;">SHP - £</option>
                                         <option value="SLL" data-symbol="&#76;&#101;">SLL - Le</option>
                                         <option value="SOS" data-symbol="&#83;">SOS - S</option>
                                         <option value="SRD" data-symbol="&#36;">SRD - $</option>
                                         <option value="STD" data-symbol="&#68;&#98;">STD - Db</option>
                                         <option value="SVC" data-symbol="&#36;">SVC - $</option>
                                         <option value="SYP" data-symbol="&#163;">SYP - £</option>
                                         <option value="SZL" data-symbol="&#76;">SZL - L</option>
                                         <option value="THB" data-symbol="&#3647;">THB - ฿</option>
                                         <option value="TJS" data-symbol="&#84;&#74;&#83;">TJS - TJS</option>
                                         <option value="TMT" data-symbol="&#109;">TMT - m</option>
                                         <option value="TND" data-symbol="&#1583;.&#1578;">TND - د.ت</option>
                                         <option value="TOP" data-symbol="&#84;&#36;">TOP - T$</option>
                                         <option value="TRY" data-symbol="&#8356;">TRY - ₤</option>
                                         <option value="TTD" data-symbol="&#36;">TTD - $</option>
                                         <option value="TWD" data-symbol="&#78;&#84;&#36;">TWD - NT$</option>
                                         <option value="UAH" data-symbol="&#8372;">UAH - ₴</option>
                                         <option value="UGX" data-symbol="&#85;&#83;&#104;">UGX - USh</option>
                                         <option value="USD" data-symbol="&#36;">USD - $</option>
                                         <option value="UYU" data-symbol="&#36;&#85;">UYU - $U</option>
                                         <option value="UZS" data-symbol="&#1083;&#1074;">UZS - лв</option>
                                         <option value="VEF" data-symbol="&#66;&#115;">VEF - Bs</option>
                                         <option value="VND" data-symbol="&#8363;">VND - ₫</option>
                                         <option value="VUV" data-symbol="&#86;&#84;">VUV - VT</option>
                                         <option value="WST" data-symbol="&#87;&#83;&#36;">WST - WS$</option>
                                         <option value="XAF" data-symbol="&#70;&#67;&#70;&#65;">XAF - FCFA
                                         </option>
                                         <option value="XCD" data-symbol="&#36;">XCD - $</option>
                                         <option value="XPF" data-symbol="&#70;">XPF - F</option>
                                         <option value="YER" data-symbol="&#65020;">YER - ﷼</option>
                                         <option value="ZAR" data-symbol="&#82;">ZAR - R</option>
                                         <option value="ZMK" data-symbol="&#90;&#75;">ZMK - ZK</option>
                                         <option value="ZWL" data-symbol="&#90;&#36;">ZWL - Z$</option>
                                     </select>
                                     <div
                                         class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                         <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                                     </div>
                                 </div>
                             </div>

                             <!-- Account Type -->
                             <div class="space-y-1">
                                 <label for="accounttype"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Account
                                     Type *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-university text-gray-400 text-sm"></i>
                                     </div>
                                     <select id="accounttype" name="accounttype"
                                         class="w-full pl-10 pr-8 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm appearance-none"
                                         required>
                                         <option value="" disabled selected>Select Account Type</option>
                                         <option value="Checking Account">Checking Account</option>
                                         <option value="Savings Account">Savings Account</option>
                                         <option value="Fixed Deposit Account">Fixed Deposit Account</option>
                                         <option value="Current Account">Current Account</option>
                                         <option value="Business Account">Business Account</option>
                                         <option value="Investment Account">Investment Account</option>
                                     </select>
                                     <div
                                         class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                         <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                                     </div>
                                 </div>
                             </div>

                             <!-- Transaction PIN -->
                             <div class="space-y-1">
                                 <label for="pin"
                                     class="block text-xs font-semibold text-gray-700 dark:text-gray-300">Transaction
                                     PIN *</label>
                                 <div class="relative">
                                     <div
                                         class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none z-10">
                                         <i class="fas fa-key text-gray-400 text-sm"></i>
                                     </div>
                                     <input type="password" id="pin" name="pin"
                                         class="w-full pl-10 pr-12 py-3 border border-gray-300/50 dark:border-gray-600/50 rounded-xl bg-gray-50/50 dark:bg-gray-700/50 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500/50 focus:border-primary-500 backdrop-blur-sm transition-all duration-300 text-sm"
                                         placeholder="4-digit PIN" maxlength="4" required>
                                     <button type="button" onclick="togglePassword('pin')"
                                         class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-primary-500 transition-colors">
                                         <i class="fas fa-eye text-sm" id="pin-eye"></i>
                                     </button>
                                 </div>
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
                                     I agree to the <a href="#"
                                         class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-medium">Terms
                                         of Service</a> and <a href="#"
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
