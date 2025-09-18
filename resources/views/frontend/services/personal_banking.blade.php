@extends('frontend.layouts.app')
@section('content')
    @include('frontend.sections.services.personal_banking.hero')
    @include('frontend.sections.services.personal_banking.account_types')
    @include('frontend.sections.services.personal_banking.digital_banking')
    @include('frontend.sections.services.personal_banking.cta')
@endsection
