@extends('auth.layouts.app')
@section('content')
    <div class="flex flex-col lg:flex-row min-h-screen">

        @include('auth.sections.forgot_password.left_side')
        @include('auth.sections.forgot_password.right_side')

    </div>
@endsection
