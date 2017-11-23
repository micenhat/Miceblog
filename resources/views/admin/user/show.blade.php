@extends('admin.layouts.app')

@section('headsection')
  <link rel="stylesheet" type="text/css" href="public/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blank page
      <small>it all starts here</small>
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Users</h3>
        @include('admin.layouts.error')
        @can('users.create',Auth::user())
        <a class="col-lg-offset-5 btn btn-success" href="{{ route('user.create') }}">Add New</a>
        @endcan
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>S.No</th>
                <th>User Name</th>
                <th>Assign Role</th>
                <th>Status</th>
                @can('users.update',Auth::user())
                <th>Edit</th>
                @endcan
                @can('users.delete',Auth::user())
                <th>Delete</th>
                @endcan
              </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>
                  @foreach($user->roles as $role)
                      {{ $role->name }},
                  @endforeach
                </td>
                <td>{{ $user->status? 'Active':'Not Active' }}</td>
                @can('users.update',Auth::user())
                <td><a href="{{ route('user.edit',$user->id) }}"> <span class="glyphicon glyphicon-edit"></span></a></td>
                @endcan
                @can('users.delete',Auth::user())
                <td>
                  <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('user.destroy',$user->id) }}" style="display: none">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  </form>
                  <a href="" onclick="
                    if(confirm('Are you sure, You want to delete this ?'))
                      {
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $user->id }}').submit();
                      }
                    else{
                        event.preventDefault();

                    }">
                  <span class="glyphicon glyphicon-trash"></span></a>

                </td>
                @endcan
              </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>User Name</th>
                  <th>Assign Role</th>
                  <th>Status</th>
                  @can('users.update', Auth::user())
                  <th>Edit</th>
                  @endcan
                  @can('users.delete', Auth::user())
                  <th>Delete</th>
                  @endcan
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
@endsection

@section('footersection')

<script src="public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection
