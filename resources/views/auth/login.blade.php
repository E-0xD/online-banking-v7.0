@extends('auth.layouts.app')
@section('content')
    <div class="flex flex-col lg:flex-row min-h-screen">

        @include('auth.sections.login.left_side')
        @include('auth.sections.login.right_side')

    </div>
@endsection
