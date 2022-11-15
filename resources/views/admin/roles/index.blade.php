@extends('layouts.admin')

@section('title')

    <title>Roles</title>

@endsection

@section('css')
  <link rel="stylesheet" href="{{  asset('admins/slider/index/index.css') }}">
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Role', 'key' => 'List']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <a href="{{  route('roles.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>

          <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên Role</th>
                    <th scope="col">Mô tả </th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                   @foreach($roles as $role)
                        <tr>
                        <th scope="row">{{ $role->id }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name}}</td>
                        <td>
                            <a href="{{ route('roles.edit', ['id'=>$role->id]) }}" class="btn btn-default">Edit</a>
                            <a href="#"
                               OnClick="return confirm('Ban co that su muon xoa?');"
                               class="btn btn-danger">Delete</a>
                        </td>
                    @endforeach

                </tbody>
            </table>
          </div>

          <div class="col-lg-12">
              {{ $roles->links() }}
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


    