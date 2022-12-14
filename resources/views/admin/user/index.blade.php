@extends('layouts.admin')

@section('title')

    <title>Users</title>

@endsection

@section('css')
  <link rel="stylesheet" href="{{  asset('admins/slider/index/index.css') }}">
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Users', 'key' => 'List']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <a href="{{  route('users.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>

          <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                  @foreach($users as $user)
                        <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', [ 'id'=>$user->id] ) }}" class="btn btn-default">Edit</a>
                            <a href="{{ route('users.delete', [ 'id'=> $user->id ] ) }}"
                               OnClick="return confirm('Ban co that su muon xoa?');"
                               class="btn btn-danger">Delete</a>
                        </td>
                    @endforeach

                </tbody>
            </table>
          </div>

          <div class="col-lg-12">
             {{ $users->links()}}
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


    