<div>
    @include('partials.livewire_bootstrap_alert')

    <x-dashboard.admin.card>
        @slot('header')
            Manage Account Settings
        @endslot

        <form wire:submit.prevent="update" method="post">
            @csrf
            @method('PUT')

            <x-dashboard.admin.card>
                @slot('header')
                    Loan Information
                @endslot

                <div class="col-md-12 mb-3">
                    <label for="loan_interest_rate">Loan Interest Rate *</label>
                    <input type="number" wire:model="loan_interest_rate" id="loan_interest_rate" name="loan_interest_rate"
                        class="form-control @error('loan_interest_rate') is-invalid @enderror">
                    @error('loan_interest_rate')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

            </x-dashboard.admin.card>

            <x-dashboard.admin.card>
                @slot('header')
                    Paypal Information
                @endslot

                <div class="col-md-12 mb-3">
                    <label for="paypal_email">Paypal Email *</label>
                    <input type="email" wire:model="paypal_email" id="paypal_email" name="paypal_email"
                        class="form-control @error('paypal_email') is-invalid @enderror">
                    @error('paypal_email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

            </x-dashboard.admin.card>

            <x-dashboard.admin.card>
                @slot('header')
                    Bank Information
                @endslot

                <div class="col-md-12 mb-3">
                    <label for="bank_name">Bank Name *</label>
                    <input wire:model="bank_name" id="bank_name" name="bank_name"
                        class="form-control @error('bank_name') is-invalid @enderror">
                    @error('bank_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="account_name">Account Name *</label>
                    <input wire:model="account_name" id="account_name" name="account_name"
                        class="form-control @error('account_name') is-invalid @enderror">
                    @error('account_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="account_number">Account Number *</label>
                    <input wire:model="account_number" id="account_number" name="account_number"
                        class="form-control @error('account_number') is-invalid @enderror">
                    @error('account_number')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="routing_number">Routing Number *</label>
                    <input wire:model="routing_number" id="routing_number" name="routing_number"
                        class="form-control @error('routing_number') is-invalid @enderror">
                    @error('routing_number')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="bank_swift_code">Bank Swift Code *</label>
                    <input wire:model="bank_swift_code" id="bank_swift_code" name="bank_swift_code"
                        class="form-control @error('bank_swift_code') is-invalid @enderror">
                    @error('bank_swift_code')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="bank_iban">Bank Iban *</label>
                    <input wire:model="bank_iban" id="bank_iban" name="bank_iban"
                        class="form-control @error('bank_iban') is-invalid @enderror">
                    @error('bank_iban')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="bank_address">Bank Address </label>
                    <textarea wire:model="bank_address" id="bank_address" name="bank_address"
                        class="form-control @error('bank_address') is-invalid @enderror" cols="30" rows="5"></textarea>
                    @error('bank_address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

            </x-dashboard.admin.card>

            <x-dashboard.admin.card>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-paper-plane me-1"></i>

                    <span wire:loading wire:target="update">Loading...</span>
                    <span wire:loading.remove wire:target="update">Update Setting</span>
                </button>

                <button type="button" wire:click="$refresh" class="btn btn-soft-secondary">
                    <i class="fa-solid fa-refresh me-1"></i> Refresh
                </button>
            </x-dashboard.admin.card>

        </form>

    </x-dashboard.admin.card>
</div>
