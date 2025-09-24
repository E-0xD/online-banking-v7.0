<div>
    @include('partials.livewire_bootstrap_alert')

    <dl class="row">
        <dt class="col-sm-3">Document Type:</dt>
        <dd class="col-sm-9">{{ $user->document_type }}</dd>

        <dt class="col-sm-3">Document (Front):</dt>
        <dd class="col-sm-9">
            @if ($user->front_side)
                <a href="{{ asset($user->front_side) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                    View Front
                </a>
            @else
                N/A
            @endif
        </dd>

        <dt class="col-sm-3">Document (Back):</dt>
        <dd class="col-sm-9">
            @if ($user->back_side)
                <a href="{{ asset($user->back_side) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                    View Back
                </a>
            @else
                N/A
            @endif
        </dd>

        <dt class="col-sm-3">Status:</dt>
        <dd class="col-sm-9">
            {{ $user->kyc }}
        </dd>
    </dl>

    <form wire:submit.prevent="updateKycStatus" method="POST">
        @csrf
        @method('PATCH')

        <div class="col-md-12 mb-3">
            <label class="form-label" for="kyc">KYC Status</label>
            <select id="kyc" wire:model="kyc" class="form-control @error('kyc') is-invalid @enderror">
                <option value="">Select KYC Status</option>
                @foreach (config('setting.kyc') as $kyc)
                    <option value="{{ $kyc }}">{{ $kyc }}</option>
                @endforeach
            </select>

            @error('kyc')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <a href="{{ route('admin.user.show', $uuid) }}" class="btn btn-soft-primary me-1 my-1"><i
                    class="fa-solid fa-arrow-left me-1"></i>
                Back to User Details</a>
            <button type="submit" class="btn btn-primary me-1 my-1"><i class="fa-solid fa-paper-plane me-1"></i>
                Update KYC Status</button>

            <button type="button" wire:click="$refresh" class="btn btn-soft-secondary me-1 my-1"><i
                    class="fa-solid fa-refresh me-1"></i> Refresh</button>
        </div>
    </form>
</div>
