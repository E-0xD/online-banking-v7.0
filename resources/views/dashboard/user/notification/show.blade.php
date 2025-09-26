@extends('dashboard.user.layouts.app')
@section('content')
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-dashboard.user.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <x-dashboard.user.card>
                        @slot('header')
                            {{ $title }}
                        @endslot
                        
                        <dl class="row">
                            <dt class="col-sm-3">Title:</dt>
                            <dd class="col-sm-9">{{ $notification->title }}</dd>

                            <dt class="col-sm-3">Message:</dt>
                            <dd class="col-sm-9">{{ $notification->description }}</dd>

                            <dt class="col-sm-3">Status:</dt>
                            <dd class="col-sm-9">
                                @if ($notification->read)
                                    <span class="badge bg-success-subtle text-success fs-12 p-1">Read</span>
                                @else
                                    <span class="badge bg-warning-subtle text-warning fs-12 p-1">Unread</span>
                                @endif
                            </dd>

                            <dt class="col-sm-3">Date:</dt>
                            <dd class="col-sm-9">{{ $notification->created_at->diffForHumans() }}</dd>
                        </dl>

                        <x-dashboard.user.back-button href="{{ route('user.notification.index') }}" />

                    </x-dashboard.user.card>
                </div>
            </div>
        </div>
    </div>
@endsection
