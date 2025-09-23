<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Account Number</th>
                <th>Balance</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.user.show', $user->uuid) }}">{{ $user->name }}
                            {{ $user->middle_name }} {{ $user->last_name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->account_number }}</td>
                    <td>{{ currency($user->currency) }}{{ formatAmount($user->account_balance) }}</td>
                    <td>
                        <span class="{{ $user->status->badge() }}"> {{ $user->status->label() }} </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.user.show', $user->uuid) }}" class="btn btn-warning  btn-sm m-1">
                            <i class="ti ti-eye me-1">
                            </i>View </a>
                        <a href="{{ route('admin.user.edit', $user->uuid) }}" class="btn btn-primary  btn-sm m-1">
                            <i class="ti ti-edit me-1">
                            </i>Edit </a>
                        <a onclick="return confirm('Are you sure?')"
                            href="{{ route('admin.user.delete', $user->uuid) }}" class="btn btn-danger  btn-sm m-1"> <i
                                class="ti ti-trash me-1">
                            </i>Delete </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
