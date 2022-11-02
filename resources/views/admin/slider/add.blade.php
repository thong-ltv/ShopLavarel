@extends('layouts.admin') 

@section('title')

    <title>Slider Add</title>

@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Slider', 'key' => 'Add']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{  route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!--   muon submit form can them @csrf -->
                    <div class="form-group">
                        <label >Ten Slider</label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror"
                               name="name" 
                               placeholder="Nhap ten slider"
                               value="{{  old('name') }}"
                        >
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label >Mo ta slider</label>
                        <textarea 
                            class="form-control @error('description') is-invalid @enderror"
                            name="description" rows="4">{{  old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label >Hinh anh</label>
                        <input type="file" 
                               class="form-control-file @error('image_path') is-invalid @enderror"
                               name="image_path" 
                        >
                        @error('image_path')
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

@endsection


    