@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="content-wrapper">
           <div class="py-2">
                <h4>User</h4>
           </div>
            <div class="row"> 
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="">
                        <h4 class="card-title float-left">All User</h4>
                        @can('create user')
                        <a href="{{ route('admin.user.create') }}" class="btn btn-info btn-sm float-right">Create User</a>
                          
                        @endcan
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th widith ="5%">Sl</th>
                            <th widith ="50%">User Role</th>
                            <th widith ="10%">Name</th>
                            <th widith ="50%">Email</th>
                            <th widith ="50%">Phone</th>
                            <th widith ="50%">Status</th>
                            <th widith ="10%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if ($users->count() > 0)
                                @foreach ($users as $key=> $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                          @foreach($user->roles as $item)
                                            <span class="badge bg-behance" style="min-width: 35%">{{ $item->name }}</span>
                                          @endforeach
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <span class="badge bg-success" style="min-width: 35px">Active</span>
                                             @else
                                             <span class="badge bg-danger" style="min-width: 35px">Inactive</span>
                                            @endif
                                        </td>
                                        
                                        <td>
                                          @can('edit user')
                                          <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                          @endcan
                                          @can('delete user')
                                          <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure!! you went to delete this!')">Delete</a>
                                          @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @endif  
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection