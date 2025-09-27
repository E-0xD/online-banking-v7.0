 <div class="card shadow-sm border-0">
     <div class="card-body">
         <h5 class="mb-3">PayPal Payment</h5>

         <p class="small text-muted mb-2">Send your payment to the PayPal account below:</p>
         <p class="fw-semibold">
             {{ $setting->paypal_email }}
         </p>

         <form method="POST" action="{{ route('user.deposit.paypal_payment.store', $deposit->reference_id) }}"
             enctype="multipart/form-data">
             @csrf
             @method('PATCH')

             <div class="mb-3">
                 <label for="payment_proof" class="form-label">Upload Payment Proof *</label>
                 <input type="file" id="payment_proof" name="payment_proof"
                     class="form-control @error('payment_proof') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf"
                     required>
                 @error('payment_proof')
                     <span class="invalid-feedback">{{ $message }}</span>
                 @enderror
             </div>

             <x-dashboard.user.form-button class="btn btn-primary w-100" icon="fa-brands fa-paypal me-1"
                 name="Submit PayPal Proof" />
         </form>
     </div>
 </div>
