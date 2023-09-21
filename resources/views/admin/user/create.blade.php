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
                        <a href="{{ route('admin.user.index') }}" class="btn btn-info btn-sm float-right">Back</a>
                    </div>
                    <div class="table-responsive">
                      <form action="{{ route('admin.user.store') }}" method="post">
                        @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="email" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Enter Email">
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="role" class="col-sm-2 col-form-label">User Role</label>
                          <div class="col-sm-10">
                            <select name="roles[]" id="" class="form-control select2" multiple="multiple">
                                @foreach ($roles as $role)
                                  <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="status" class="col-sm-2 col-form-label">Status</label>
                          <div class="col-sm-10">
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row p-3">
                          <button type="submit" class="btn btn-success">Save</button>
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
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
    font-size: medium !important;
}
</style>
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
      $(document).ready(function() {
          $('.select2').select2();
      });
  </script>
@endpush