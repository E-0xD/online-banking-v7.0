<div>
    @include('partials.livewire_bootstrap_alert')

    <form wire:submit.prevent="createNotification" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror"
                id="title" name="title">

            @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" rows="3"></textarea>

            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <a href="{{ route('admin.user.notification.index', $uuid) }}" class="btn btn-soft-primary m-1"> <i
                class="fa-solid fa-arrow-left me-1"></i>
            Back to Notifications</a>
        <button type="submit" class="btn btn-primary m-1"> <i class="fa-solid fa-paper-plane me-1"></i> Create
            Notification</button>
        <button type="button" wire:click="$refresh" class="btn btn-soft-secondary m-1"><i
                class="fa-solid fa-refresh me-1"></i> Refresh</button>
    </form>

</div>
