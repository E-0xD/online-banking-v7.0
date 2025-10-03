@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Please fix the following issues:
        <ul class="mb-0 mt-2 list-unstyled">
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
