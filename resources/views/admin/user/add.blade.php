@extends('layouts.admin') 

@section('title')

    <title>Users Add</title>

@endsection

@section('css')
    <link href="{{  asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{  asset('admins/user/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Users', 'key' => 'Add']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!--   muon submit form can them @csrf -->
                    <div class="form-group">
                        <label >Tên</label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror"
                               name="name" 
                               placeholder="Nhap tên"
                               value="{{  old('name') }}"
                        >
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label >Email</label>
                        <input type="text" 
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" 
                               placeholder="Nhập email"
                               value="{{  old('email') }}"
                        >
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   
                    </div>

                    <div class="form-group">
                        <label >Password</label>
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" 
                               placeholder="Nhập password"
                               value="{{  old('password') }}"
                        >
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <div class="form-group">
                        <label >Chọn vai trò</label>
                        <select name="role_id[]" class="form-control select2_init @error('role_id') is-invalid @enderror" multiple>
                            <option value=""></option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @section('js')
    <script src="{{  asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{  asset('admins/user/add/add.js') }}"></script>
@endsection

@endsection


    