@extends('auth.layouts.app')
@section('content')
    <div class="flex flex-col lg:flex-row min-h-screen">

        @include('auth.sections.two_factor_authentication.left_side')
        @include('auth.sections.two_factor_authentication.right_side')

    </div>
@endsection