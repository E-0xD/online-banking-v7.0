@extends('auth.layouts.app')
@section('content')
    <div class="flex flex-col lg:flex-row min-h-screen">
        @include('auth.sections.verify_email.left_side')
        @include('auth.sections.verify_email.right_side')
    </div>
@endsection
