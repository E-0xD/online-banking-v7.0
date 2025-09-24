<div>
    @include('partials.livewire_bootstrap_alert')

    <x-dashboard.admin.card>
        @slot('header')
            Manage Account Settings
        @endslot

        <form wire:submit.prevent="update" method="post">
            @csrf
            @method('PUT')

            <div class="col-md-12 mb-3">
                <label for="loan_interest_rate">Loan Interest Rate *</label>
                <input type="number" wire:model="loan_interest_rate" id="loan_interest_rate" name="loan_interest_rate"
                    class="form-control @error('loan_interest_rate') is-invalid @enderror">
                @error('loan_interest_rate')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="virtual_card_fee">Virtual Card Fee *</label>
                <input type="number" wire:model="virtual_card_fee" id="virtual_card_fee" name="virtual_card_fee"
                    class="form-control @error('virtual_card_fee') is-invalid @enderror">
                @error('virtual_card_fee')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-paper-plane me-1"></i>

                <span wire:loading wire:target="update">Loading...</span>
                <span wire:loading.remove wire:target="update">Update Setting</span>
            </button>

            <button type="button" wire:click="$refresh" class="btn btn-soft-secondary">
                <i class="fa-solid fa-refresh me-1"></i> Refresh
            </button>
        </form>

    </x-dashboard.admin.card>
</div>
