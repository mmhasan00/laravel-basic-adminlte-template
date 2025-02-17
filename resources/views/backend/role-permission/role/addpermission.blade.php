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

                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                      Roles : {{$role->name}}
                        <a href="{{route('roles.index')}}" class="btn btn-danger float-right">Back</a>
                    </div>

                    <div class="card-body">
                      <form action="{{route('roles.givepermission',$role->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            @error('permissions')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                          <label for="">Permissions:</label>
                          <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-2">
                                        <label>
                                            <input type="checkbox" name="permissions[]" value="{{$permission->name}}" class="flat-red" {{in_array($permission->id,$rolepermissions) ? 'checked' : ''}}>
                                            {{ $permission->name }}

                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
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


