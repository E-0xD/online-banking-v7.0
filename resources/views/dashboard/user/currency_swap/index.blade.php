@extends('dashboard.user.layouts.app')

@section('content')
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>
        </div>

        <div class="page-body">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    @livewire('dashboard.currency-swap')
                </div>
            </div>
        </div>
    </div>
@endsection
