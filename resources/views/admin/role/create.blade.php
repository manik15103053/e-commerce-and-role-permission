@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="content-wrapper">
           <div class="py-2">
                <h4>Role Create</h4>
           </div>
            <div class="row"> 
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="">
                        <h4 class="card-title float-left">Create Role</h4>
                        <a href="{{ route('admin.role.index') }}" class="btn btn-info btn-sm float-right">Back</a>
                    </div>
                    <div class="table-responsive">
                      <form action="{{ route('admin.role.store') }}" method="post">
                        @csrf
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-12">
                                    <div class="form-group p-4">
                                        @foreach ($permissions as $item)
                                        <div class="ml-3 role-management-checkbox">
                                            <input onclick="checksinglepermission('role-management-checkbox','management')" name="permissions[]" id="permission_checkbox{{ $item->id }}" value="{{ $item->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="permission_checkbox{{ $item->id }}" class="ml-2 text-lg text-gray-900 dark:text-gray-300">
                                                {{ $item->name }} <br>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group p-4">
                                    <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                </div>
                            </div>    
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection