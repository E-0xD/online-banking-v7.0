@extends('frontend.layouts.app')
@section('content')
    @include('frontend.sections.services.grant.hero')
    @include('frontend.sections.services.grant.available_grant')
    @include('frontend.sections.services.grant.application_process')
    @include('frontend.sections.services.grant.cta')
@endsection
