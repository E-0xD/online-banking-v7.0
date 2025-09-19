@extends('auth.layouts.app')

@section('content')
    <div class="flex flex-col lg:flex-row min-h-screen">

        @include('auth.sections.register.left_side')
        @include('auth.sections.register.right_side')

    </div>
@endsection
