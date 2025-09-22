 <div class="table-responsive">
     <table id="myTable" class="table table-bordered">
         <thead>
             <tr>
                 <th>#</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Status</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($admins as $index => $admin)
                 <tr>
                     <td>{{ $index + 1 }}</td>
                     <td>
                         <a href="{{ route('master.admin.show', $admin->uuid) }}">{{ $admin->name }}</a>
                     </td>
                     <td>{{ $admin->email }}</td>
                     <td>
                         <span class="{{ $admin->status->badge() }}">{{ $admin->status->label() }}</span>
                     </td>
                     <td>
                         <a href="{{ route('master.admin.edit', $admin->uuid) }}" class="btn btn-primary"> <i
                                 class="ti ti-edit me-1"></i> Edit</a>
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>

 </div>
