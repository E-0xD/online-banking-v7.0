@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-dashboard.admin.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            @include('dashboard.admin.user.partials.account_options_and_status')

            <div class="col-lg-12">

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
                    </dl>

                    <form action="{{ route('admin.user.support.store', [$user->uuid, $support->uuid]) }}" method="post">
                        @csrf

                        <x-dashboard.user.form-select name="status" id="support_status" label="Status" type="select"
                            class="col-md-12 mb-3" value="{{ $support->status }}" :options="config('setting.supportStatuses')" />

                        <x-dashboard.user.form-input name="reply_message" id="support_reply_message" label="Reply Message"
                            type="textarea" class="col-md-12 mb-3"
                            formText="Enter your reply message, Message will be sent to user email" />

                        <x-dashboard.admin.submit-and-back-button back="Back to User Support"
                            href="{{ route('admin.user.support.index', $user->uuid) }}" />
                    </form>

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
