@extends('auth.layouts.app')
@section('content')
    <div class="flex flex-col lg:flex-row min-h-screen">

        @include('auth.sections.reset_password.left_side')
        @include('auth.sections.reset_password.right_side')

    </div>
@endsection
