 <div class="d-flex align-items-center justify-content-center">
     <form method="POST" action="{{ route('user.deposit.credit_card_payment.store', $deposit->reference_id) }}">
         @csrf
         @method('PATCH')

         <div class="row">
             <div class="col-md-12">
                 <div class="mb-3">
                     <label for="card_number" class="form-label">Card Number *</label>
                     <input type="text" id="card_number" name="card_number"
                         class="form-control @error('card_number') is-invalid @enderror"
                         value="{{ old('card_number') }}" placeholder="1234 5678 9012 3456">
                     @error('card_number')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>
             </div>

             <div class="col-md-12">
                 <div class="mb-3">
                     <label for="cvv" class="form-label">CVV *</label>
                     <input type="text" id="cvv" name="cvv"
                         class="form-control @error('cvv') is-invalid @enderror" value="{{ old('cvv') }}"
                         placeholder="123">
                     @error('cvv')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>

                 <div class="mb-3">
                     <label for="card_expiry_date" class="form-label">Card Expiry Date (MM/YY)
                         *</label>
                     <input type="text" id="card_expiry_date" name="card_expiry_date"
                         class="form-control @error('card_expiry_date') is-invalid @enderror"
                         value="{{ old('card_expiry_date') }}" placeholder="12/25">
                     @error('card_expiry_date')
                         <span class="invalid-feedback">{{ $message }}</span>
                     @enderror
                 </div>
             </div>
         </div>

         <div class="row">
             <div class="col-12">
                 <x-dashboard.user.form-button class="btn btn-primary w-100" icon="fa-solid fa-check-circle me-1"
                     name="Submit Payment" />
             </div>
         </div>
     </form>
 </div>
