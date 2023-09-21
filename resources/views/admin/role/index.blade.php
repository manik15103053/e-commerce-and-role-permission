@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="content-wrapper">
           <div class="py-2">
                <h4>Roles</h4>
           </div>
            <div class="row"> 
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="">
                        <h4 class="card-title float-left">All Roles</h4>
                        <a href="{{ route('admin.role.create') }}" class="btn btn-info btn-sm float-right">Create Role</a>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th widith ="5%">Sl</th>
                            <th widith ="10%">Name</th>
                            <th widith ="50%">Permission</th>
                            <th widith ="10%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if ($roles->count() > 0)
                                @foreach ($roles as $key=> $role)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $item)
                                                <span class="badge bg-info" style="font-size: 8px">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ route('admin.role.delete', $role->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure!! you went to delete this!')">Delete</a>
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