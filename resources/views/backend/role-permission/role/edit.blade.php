hello world
@extends('backend.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Roles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Settings</li>
            <li class="breadcrumb-item active">Roles</li>
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
                      Roles
                        <a href="{{route('roles.index')}}" class="btn btn-danger float-right">Back</a>
                    </div>

                    <div class="card-body">
                      <form action="{{route('roles.update',$role->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                          <label for="name">Role Name</label>
                          <input type="text" name="name" class="form-control" id="name" placeholder="Enter Roles Name" value="{{$role->name}}">
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


