@extends('layouts.admin') 

@section('title')

    <title>Roles Add</title>

@endsection

@section('css')
    <link href="{{  asset('admins/role/add/add.css') }}" rel="stylesheet" />
@endsection


@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Role', 'key' => 'Add']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                    
                    @csrf <!--   muon submit form can them @csrf -->
                    <div class="form-group">
                        <label >Ten Role</label>
                        <input type="text" 
                            class="form-control"
                            name="name" 
                            placeholder="Nhap ten Role"
                            value="{{  old('name') }}"
                        >
                        
                    </div>

                    <div class="form-group">
                        <label >Mo ta Role</label>
                        <textarea 
                            class="form-control"
                            name="description" rows="4">{{  old('description') }}</textarea>
                        
                    </div>

                        
                </div>
                
                <div class="col-md-12">
                    <div class="row">
                        <div class="card border-primary mb-3 col-md-12">
                            <div class="card-header">
                                <label>
                                    <input type="checkbox" value="">
                                </label>    
                                Module san pham
                            </div>
                            <div class="row">
                                @for($i = 0; $i < 4; $i++)
                                <div class="card-body text-primary">
                                    <h5 class="card-title">
                                        <label>
                                            <input type="checkbox" value="">
                                        </label>
                                        Them san pham
                                    </h5>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


    