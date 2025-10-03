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
                <x-dashboard.available_balance :user="$user" />
                
                <x-dashboard.admin.card>
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
                                            <a href="{{ route('admin.user.card.show', [$user->uuid, $card->uuid]) }}"
                                                class="btn btn-warning  btn-sm m-1">
                                                <i class="ti ti-eye me-1">
                                                </i>View </a>

                                            <form action="{{ route('admin.user.card.delete', [$user->uuid, $card->uuid]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger  btn-sm m-1"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="ti ti-trash me-1">
                                                    </i>Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
