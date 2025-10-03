 <!--  Modal content for the Large example -->
 <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myLargeModalLabel">Edit User</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form id="updateForm" action="{{ route('admin.user.update', $user->uuid) }}" method="post"
                     enctype="multipart/form-data">
                     @csrf
                     @method('PUT')

                     <div class="row">
                         <x-dashboard.admin.form-input name="name" label="Name" class="col-md-6 mb-3"
                             value="{{ $user->name }}" />

                         <x-dashboard.admin.form-input name="middle_name" label="Middle Name" class="col-md-6 mb-3"
                             value="{{ $user->middle_name }}" />

                         <x-dashboard.admin.form-input name="last_name" label="Last Name" class="col-md-6 mb-3"
                             value="{{ $user->last_name }}" />

                         <x-dashboard.admin.form-input name="username" label="Username" class="col-md-6 mb-3"
                             value="{{ $user->username }}" />

                         <x-dashboard.admin.form-input name="email" label="Email Address" class="col-md-6 mb-3"
                             type="email" value="{{ $user->email }}" />

                         <x-dashboard.admin.form-input name="phone" label="Phone Number" class="col-md-6 mb-3"
                             value="{{ $user->phone }}" />

                         <x-dashboard.admin.form-select name="country" label="Country" type="select"
                             class="col-md-6 mb-3" value="{{ $user->country }}" :options="config('setting.countries')" />

                         <x-dashboard.admin.form-input name="address" label="Address" class="col-md-6 mb-3"
                             value="{{ @$user->address }}" />

                         <x-dashboard.admin.form-input name="city" label="City" class="col-md-6 mb-3"
                             value="{{ @$user->city }}" />

                         <x-dashboard.admin.form-input name="state" label="State" class="col-md-6 mb-3"
                             value="{{ @$user->state }}" />

                         <x-dashboard.admin.form-input name="zip_code" label="Zip Code" class="col-md-6 mb-3"
                             value="{{ @$user->zip_code }}" />

                         <x-dashboard.admin.form-select name="title" label="Title" type="select"
                             class="col-md-6 mb-3" value="{{ @$user->title }}" :options="config('setting.titles')" />

                         <x-dashboard.admin.form-input name="dob" label="Date of Birth" type="date"
                             class="col-md-6 mb-3" value="{{ $user->dob }}" />

                         <x-dashboard.admin.form-select name="gender" label="Gender" type="select"
                             class="col-md-6 mb-3" value="{{ $user->gender }}" :options="config('setting.genders')" />

                         <x-dashboard.admin.form-select name="marital_status" label="Marital Status" type="select"
                             class="col-md-6 mb-3" value="{{ $user->marital_status }}" :options="config('setting.maritalStatus')" />

                         <x-dashboard.admin.form-select name="employment" label="Type of Employment" type="select"
                             class="col-md-6 mb-3" value="{{ $user->employment }}" :options="config('setting.employments')" />

                         <div class="col-md-6 mb-3">
                             <label for="currency" class="form-label">Currency</label>
                             <select id="currency" name="currency"
                                 class="form-select @error('currency') is-invalid @enderror">
                                 <option value="">Select Currency</option>
                                 @foreach (config('setting.currencies') as $key => $currency)
                                     <option
                                         value="{{ $currency['name'] }}-{{ $currency['code'] }}-{{ $currency['symbol'] }}"
                                         {{ $user->currency == $currency['name'] . '-' . $currency['code'] . '-' . $currency['symbol'] ? 'selected' : '' }}>
                                         {{ $currency['name'] }}</option>
                                 @endforeach
                             </select>

                             @error('currency')
                                 <span class="invalid-feedback">{{ $message }}</span>
                             @enderror
                         </div>

                         <x-dashboard.admin.form-select name="account_type" label="Account Type" type="select"
                             class="col-md-6 mb-3" value="{{ $user->account_type }}" :options="config('setting.accountTypes')" />

                         <x-dashboard.admin.form-input name="account_limit" label="Account Limit"
                             class="col-md-6 mb-3" type="number" value="{{ $user->account_limit }}" />

                         <x-dashboard.user.form-select name="should_transfer_fail" label="Should Transfer Fail"
                             type="select" class="col-md-6 mb-3" value="{{ $user->should_transfer_fail }}"
                             :options="['Yes', 'No']" />

                         <x-dashboard.admin.form-input name="security_number"
                             label="State Security Number (SSN, NI, SIN etc.)" class="col-md-6 mb-3"
                             value="{{ $user->security_number }}" />

                         <x-dashboard.user.form-select name="salary_range" label="Annual Income Range" type="select"
                             class="col-md-6 mb-3" value="{{ $user->salary_range }}" :options="config('setting.salaryRanges')" />

                         <x-dashboard.user.form-input name="next_of_kin_name" label="Beneficiary Legal Name"
                             class="col-md-6 mb-3" value="{{ $user->next_of_kin_name }}" />

                         <x-dashboard.user.form-input name="next_of_kin_address" label="Next of Kin Address"
                             class="col-md-6 mb-3" value="{{ $user->next_of_kin_address }}" />

                         <x-dashboard.user.form-input name="next_of_kin_relationship" label="Relationship"
                             class="col-md-6 mb-3" value="{{ $user->next_of_kin_relationship }}" />

                         <x-dashboard.user.form-input name="next_of_kin_age" label="Age" type="number"
                             class="col-md-6 mb-3" value="{{ $user->next_of_kin_age }}" />

                         <x-dashboard.user.form-input name="next_of_kin_phone" label="Phone" class="col-md-6 mb-3"
                             value="{{ $user->next_of_kin_phone }}" />

                         <x-dashboard.user.form-input name="next_of_kin_email" label="Email" type="email"
                             class="col-md-6 mb-3" value="{{ $user->next_of_kin_email }}" />

                         <x-dashboard.user.form-input name="image" label="Profile Image" type="file"
                             class="col-md-6 mb-3"
                             formText="{{ $user->image ? 'Update your profile picture' : 'Upload a profile picture' }}" />

                         <x-dashboard.user.form-input name="password" label="Password" type="password"
                             id="new_user_password" class="col-md-6 mb-3" />
                     </div>

                     <div id="updateMessage"></div>

                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                     <x-dashboard.admin.form-button name="Update" />
                 </form>
             </div>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->

 @include('dashboard.admin.user.partials.script')
