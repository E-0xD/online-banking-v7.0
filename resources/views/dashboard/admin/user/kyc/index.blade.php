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
                        User {{ $title }} Management
                    @endslot

                    <dl class="row">
                        <dt class="col-sm-3">Document Type:</dt>
                        <dd class="col-sm-9">{{ $user->document_type }}</dd>

                        <dt class="col-sm-3">Document (Front):</dt>
                        <dd class="col-sm-9">
                            @if ($user->front_side)
                                <a href="{{ asset($user->front_side) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    View Front
                                </a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <dt class="col-sm-3">Document (Back):</dt>
                        <dd class="col-sm-9">
                            @if ($user->back_side)
                                <a href="{{ asset($user->back_side) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    View Back
                                </a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <dt class="col-sm-3">Status:</dt>
                        <dd class="col-sm-9">
                            <span class="{{ $user->kyc->badge() }}">
                                {{ $user->kyc->label() }}
                            </span>
                        </dd>
                    </dl>

                    @if ($user->kycIsPending())
                        <div class="mb-3">
                            <form action="{{ route('admin.user.kyc.approve', $user->uuid) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-success"> <i class="ti ti-check me-1"></i>
                                    Approve</button>
                            </form>

                        </div>
                        <div class="mb-3">
                            <form action="{{ route('admin.user.kyc.reject', $user->uuid) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-times me-1"></i>
                                    Reject</button>
                            </form>
                        </div>
                    @endif
            </div>

            </x-dashboard.admin.card>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    </div>
@endsection
