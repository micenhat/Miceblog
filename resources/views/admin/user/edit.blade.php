@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
      <small>Advanced form element</small>
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Admin</h3>
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          @include('admin.layouts.error')
          <form role="form" action="{{ route('user.update',$user->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
              <div class="form-group">

                  <label for="name">User Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="@if(old('name')){{ old('name') }} @else{{ $user->name }}
                    @endif">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="@if(old('email')){{ old('email') }} @else{{ $user->email }}
                    @endif">
                </div>
                <div class="form-group">
                  <label for="password_confirmation">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="@if(old('phone')){{ old('phone') }} @else{{ $user->phone }}
                    @endif">
                </div>

                <!-- <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="@if(old('password')){{ old('password') }} @else{{ $user->password }}
                    @endif">
                </div>
                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm_Password">
                </div> -->
                <div class="form-group">
                    <label for="confirm_password">Status</label>
                    <div class="checkbox">
                      <label><input type="checkbox" name="status" @if(old('status')==1 || $user->status == 1)
                        checked
                        @endif value="1">Status</label>
                    </div>
                </div>

                <div class="form-group" >
                    <label for="role">Assign Role</label>
                    <div class="row">
                    @foreach($roles as $role)
                    <div class="col-lg-2">
                      <div class="checkbox">
                        <label><input type="checkbox" name="role[]" value="{{ $role->id}}"
                          @foreach($user->roles as $user_role)
                            @if($user_role->id == $role->id)
                              checked
                            @endif
                          @endforeach
                          >{{ $role->name }}</label>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a type="button" href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
                </div>
                </div>
            </div>
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
@endsection
