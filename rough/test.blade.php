 <form wire:submit.prevent="updateAccountState" method="POST">
     @csrf
     @method('PATCH')

     <div class="col-md-12 mb-3">
         <label class="form-label" for="account_state">Account State</label>
         <select id="account_state" wire:model="account_state"
             class="form-control @error('account_state') is-invalid @enderror">
             <option value="">Select Account State</option>
             @foreach (config('setting.accountStates') as $state)
                 <option value="{{ $state }}">{{ $state }}</option>
             @endforeach
         </select>

         @error('account_state')
             <span class="invalid-feedback">{{ $message }}</span>
         @enderror
     </div>
     <div class="col-md-12 mb-3">
         <label class="form-label" for="account_state_message">Account State Message</label>
         <textarea wire:model.lazy="account_state_message" type="textarea" id="account_state_message"
             class="form-control @error('account_state_message') is-invalid @enderror" cols="30" rows="5"></textarea>
         @error('account_state_message')
             <span class="invalid-feedback">{{ $message }}</span>
         @enderror
     </div>

     <div class="mb-3">
         <a href="{{ route('admin.user.show', $userId) }}" class="btn btn-soft-primary"><i
                 class="fa-solid fa-arrow-left me-1"></i>
             Back to User Details</a>
         <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane me-1"></i>
             Update Account State</button>
     </div>
 </form>
