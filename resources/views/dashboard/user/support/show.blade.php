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
                <x-dashboard.admin.card>
                    @slot('header')
                        User {{ $title }}
                    @endslot

                    <dl class="row">
                        <dt class="col-sm-3">Title:</dt>
                        <dd class="col-sm-9">{{ $support->title }}</dd>

                        <dt class="col-sm-3">Priority:</dt>
                        <dd class="col-sm-9">{{ $support->priority }}</dd>

                        <dt class="col-sm-3">Description:</dt>
                        <dd class="col-sm-9">{{ $support->description }}</dd>

                        <dt class="col-sm-3">Status:</dt>
                        <dd class="col-sm-9">{{ $support->status }}</dd>

                        <dt class="col-sm-3">Date:</dt>
                        <dd class="col-sm-9">{{ $support->created_at->diffForHumans() }}</dd>

                        <dt class="col-sm-3">Updated at:</dt>
                        <dd class="col-sm-9">{{ $support->updated_at->diffForHumans() }}</dd>
                    </dl>

                    <x-dashboard.user.info-list title="Ticket Updates via Email" :options="[
                        ' All replies and updates regarding this ticket will be sent to your registered email address. Please check your inbox (and spam folder) for responses from our support team.',
                        'Ticket statuses and progress are managed internally by our team.',
                    ]" />

                </x-dashboard.admin.card>
            </div>
        </div>
    </div>
@endsection
