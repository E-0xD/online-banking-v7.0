{{-- <form action="{{ route('admin.user.account_state.update', $user->uuid) }}" method="post">
    @csrf
    @method('PATCH')
    <!-- Account State -->
    <x-dashboard.admin.form-select name="account_state" label="Account State" type="select" class="col-md-12 mb-3"
        value="{{ $user->account_state }}" :options="config('setting.accountStates')" />

    <!-- Message -->
    <x-dashboard.admin.form-input name="account_state_message" label="Account State Message" type="textarea"
        class="col-md-12 mb-3" value="{{ $user->account_state_message }}" />

    <x-dashboard.admin.submit-and-back-button back="Back to User Details" submit="Update Account State"
        href="{{ route('admin.user.show', $user->uuid) }}" />
</form> --}}