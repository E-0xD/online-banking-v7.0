@if (session()->has('email_success'))
    <div class="alert alert-success text-center bg-green-500 border-green-500 p-2 rounded">
        {{ session()->get('email_success') }}</div>
@elseif(session()->has('email_error'))
    <div class="alert alert-danger text-center bg-red-500 border-red-500 p-2 rounded">{{ session()->get('email_error') }}
    </div>
@endif
