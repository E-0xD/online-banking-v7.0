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
                <x-dashboard.user.card>
                    @slot('header')
                        {{ $title }}
                    @endslot

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Card Holder Name</th>
                                    <th>Card Type</th>
                                    <th>Card Level</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cards as $card)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $card->card_holder_name }}
                                        </td>
                                        <td>
                                            {{ $card->card_type }}
                                        </td>
                                        <td>
                                            {{ $card->card_level }}
                                        </td>
                                        <td>
                                            <span class="{{ $card->status->badge() }}">
                                                {{ $card->status->label() }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('user.card.show', $card->uuid) }}"
                                                class="btn btn-warning  btn-sm m-1">
                                                <i class="ti ti-eye me-1">
                                                </i>View </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
