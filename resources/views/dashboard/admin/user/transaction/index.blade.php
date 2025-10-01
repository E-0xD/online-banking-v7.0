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
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            Fund Account
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.user.transaction.store', $user->uuid) }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Amount -->
                                <div class="col-md-6 mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" step="0.01" min="0"
                                        class="form-control @error('amount') is-invalid @enderror" id="amount"
                                        name="amount" value="{{ old('amount', 100000) }}">
                                    @error('amount')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Type -->
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="form-label">Transaction Type</label>
                                    <select id="type" name="type"
                                        class="form-select @error('type') is-invalid @enderror">
                                        <option value="">-- Select Type --</option>
                                        @foreach ($transactionTypes as $transactionType)
                                            <option value="{{ $transactionType->value }}"
                                                {{ old('type', 'deposit') == $transactionType->value ? 'selected' : '' }}>
                                                {{ $transactionType->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Direction -->
                                <div class="col-md-6 mb-3">
                                    <label for="direction" class="form-label">Transaction Direction</label>
                                    <select id="direction" name="direction"
                                        class="form-select @error('direction') is-invalid @enderror">
                                        <option value="">-- Select Direction --</option>
                                        @foreach ($transactionDirections as $transactionDirection)
                                            <option value="{{ $transactionDirection->value }}"
                                                {{ old('direction', 'credit') == $transactionDirection->value ? 'selected' : '' }}>
                                                {{ $transactionDirection->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('direction')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Date -->
                                <div class="col-md-6 mb-3">
                                    <label for="transaction_at" class="form-label">Transaction Date</label>
                                    <input type="datetime-local"
                                        class="form-control @error('transaction_at') is-invalid @enderror"
                                        id="transaction_at" name="transaction_at"
                                        value="{{ old('transaction_at', now()->format('Y-m-d H:i:s')) }}">
                                    @error('transaction_at')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-6 mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description"
                                        value="{{ old('description', 'User initiated transaction') }}"
                                        placeholder="Optional">
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Notification -->
                                <div class="col-md-6 mb-3">
                                    <label for="notification" class="form-label">Send Notification</label>
                                    <select id="notification" name="notification"
                                        class="form-select @error('notification') is-invalid @enderror">
                                        <option value="none" {{ old('notification') == 'none' ? 'selected' : '' }}>
                                            None
                                        </option>
                                        <option value="email"
                                            {{ old('notification', 'email') == 'email' ? 'selected' : '' }}>
                                            Email
                                        </option>
                                    </select>
                                    @error('notification')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-paper-plane me-1"></i>
                                Submit Transaction</button>
                        </form>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title border-bottom mb-0">
                            Transaction History
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reference ID</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transaction->reference_id }}</td>
                                            <td>
                                                {{ $transaction->type->label() }}
                                            </td>
                                            <td>
                                                {{ $transaction->description }}
                                            </td>
                                            <td>
                                                @if ($transaction->isDirectionCredit())
                                                    <span
                                                        class="text-success">+{{ currency($user->currency) }}{{ formatAmount($transaction->amount) }}</span>
                                                @else
                                                    <span
                                                        class="text-danger">-{{ currency($user->currency) }}{{ formatAmount($transaction->amount) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ currency($user->currency) }}{{ formatAmount($transaction->current_balance) }}
                                            </td>
                                            <td>
                                                {{ formatDateTime($transaction->transaction_at) }}
                                            </td>
                                            <td>
                                                <span class="{{ $transaction->status->badge() }}">
                                                    {{ $transaction->status->label() }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.user.transaction.show', [$user->uuid, $transaction->uuid]) }}"
                                                    class="btn btn-warning btn-sm m-1">
                                                    <i class="ti ti-eye me-1">
                                                    </i>View </a>
                                                <form
                                                    action="{{ route('admin.user.transaction.delete', [$user->uuid, $transaction->uuid]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm m-1"
                                                        onclick="return confirm('Are you sure you want to delete this transaction?')">
                                                        <i class="ti ti-trash me-1"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
