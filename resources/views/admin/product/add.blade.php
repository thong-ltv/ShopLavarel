@extends('layouts.admin') 

@section('title')

    <title>Add Product</title>

@endsection

@section('css')
    <link href="{{  asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{  asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Product', 'key' => 'Add']);
    <!-- /.content-header -->
    <!-- <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div> -->

    <!-- Main content -->
    <form action="{{  route('products.store') }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                
                    @csrf <!--   muon submit form can them @csrf -->
                    <div class="form-group">
                        <label >Tên sản phẩm </label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror"
                               name="name" 
                               placeholder="Nhập tên sản phẩm"
                               value="{{  old('name') }}"
                        >
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Giá sản phẩm </label>
                        <input type="text" 
                               class="form-control @error('price') is-invalid @enderror"
                               name="price" 
                               placeholder="Nhập giá sản phẩm"
                               value="{{  old('price') }}"
                        >
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Màu sắc sản phẩm </label>
                        <input type="text" 
                               class="form-control @error('color') is-invalid @enderror"
                               name="color" 
                               placeholder="Nhập tên sản phẩm"
                               value="{{  old('color') }}"
                        >
                        @error('color')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Chọn kích thước</label>
                        <select class="form-control @error('sizes') is-invalid @enderror" name="sizes">
                        <option value="">Chon kích thước</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        </select>
                        @error('sizes')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Ảnh đại diện sản phẩm </label>
                        <input type="file" 
                               class="form-control-file"
                               name="feature_image_path" 
                        >
                    </div>
                    <div class="form-group">
                        <label >Ảnh chi tiết sản phẩm </label>
                        <input type="file"
                               multiple
                               class="form-control-file"
                               name="image_path[]" 
                        >
                    </div>

                    <div class="form-group">
                        <label >Chon danh muc</label>
                        <select class="form-control danhmuc_selected2 @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="">Chon danh muc</option>
                        <!-- dua 2 dau !! truoc va sau chuoi string de no hieu -->
                        {!!  $htmlOption !!} 
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label >Nhập tags</label>
                        <select class="form-control tags_select_choose" multiple="multiple" name="tags[]">
                        </select>
                    </div>                   
            </div>
            <div class="col-md-12">
                        <div class="form-group">
                            <label>Nhập nội dung</label>
                            <textarea value="" class="form-control tinymce_editor_init @error('content') is-invalid @enderror" name="content" rows="10">{{  old('content') }}</textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('js')
    <script src="{{  asset('vendors/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{  asset('admins/product/add/add.js') }}"></script>
@endsection


    