@extends('backend.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Settings</li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Users
                        <a href="{{route('users.index')}}" class="btn btn-danger float-right">Back</a>
                    </div>

                    <div class="card-body">
                      <form action="{{route('users.store')}}" method="post">
                        @csrf

                        <div class="mb-3">
                          <label for="name">User Name</label>
                          <input type="text" name="name" class="form-control" id="name" placeholder="Enter User Name">

                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">

                          
                          <label for="password">Password</label>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">

                          
                          <label for="role">Select Role</label>
                          <select name="role[]" id="role" class="form-control" multiple aria-label=".form-select-sm example">
                            <option value="">Select Role</option>
                              @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                              @endforeach
                          </select>
                          <div class="mb-3 mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                          </div>
                          @error('name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>



    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection


