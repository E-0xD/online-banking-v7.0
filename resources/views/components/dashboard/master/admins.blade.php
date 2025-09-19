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
                         <x-dashboard.master.link href="{{ route('master.admin.show', $admin->uuid) }}"
                             name="{{ $admin->name }}" />
                     </td>
                     <td>{{ $admin->email }}</td>
                     <td>
                         <span class="{{ $admin->status->badge() }}">{{ $admin->status->label() }}</span>
                     </td>
                     <td>
                         <x-dashboard.master.link href="{{ route('master.admin.edit', $admin->uuid) }}"
                             class="btn btn-primary m-1" name="Edit" />
                     </td>
                 </tr>
             @endforeach
         </tbody>
     </table>

 </div>
