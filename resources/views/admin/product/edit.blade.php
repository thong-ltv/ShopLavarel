@extends('layouts.admin') 

@section('title')

    <title>Edit Product</title>

@endsection

@section('css')
    <link href="{{  asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{  asset('admins/product/add/add.css') }}" rel="stylesheet" />
    <link href="{{  asset('admins/product/edit/edit.css') }}" rel="stylesheet" />
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Product', 'key' => 'Edit']);
    <!-- /.content-header -->

    <!-- Main content -->
    <form action="{{  route('products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                
                    @csrf <!--   muon submit form can them @csrf -->
                    <div class="form-group">
                        <label >Tên sản phẩm </label>
                        <input type="text" 
                               class="form-control"
                               name="name" 
                               placeholder="Nhập tên sản phẩm"
                               value="{{  $product->name }}"
                        >
                    </div>
                    <div class="form-group">
                        <label >Giá sản phẩm </label>
                        <input type="text" 
                               class="form-control"
                               name="price" 
                               placeholder="Nhập giá sản phẩm"
                               value="{{  $product->price }}"
                        >
                    </div>
                    <div class="form-group">
                        <label >Màu sắc sản phẩm </label>
                        @foreach($colors as $color)
                            <div class="form-check">
                            <input class="form-check-input @error('product_colors') is-invalid @enderror" type="checkbox"
                                    {{  $colorsChecked->contains('id', $color->id) ? "checked" : "" }}
                                   name="product_colors[]" id="" value="{{ $color->id }}" >
                            <label class="form-check-label" for="">
                                {{ $color->name }}
                            </label>
                            </div>
                        @endforeach

                        @error('product_colors')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
    
                    </div>
                    <div class="form-group">
                        <label >Chọn kích thước</label>
                        @foreach($sizes as $size)
                        <div class="form-check">
                            <input class="form-check-input @error('product_sizes') is-invalid @enderror" type="checkbox"
                                  {{  $sizesChecked->contains('id', $size->id) ? "checked" : "" }}
                                   name="product_sizes[]" id="" value="{{ $size->id }}" >
                            <label class="form-check-label" for="exampleRadios1">
                                {{ $size->name }}
                            </label>
                        </div>
                         @endforeach  

                         @error('product_sizes')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Ảnh đại diện sản phẩm </label>
                        <input type="file" 
                               class="form-control-file"
                               name="feature_image_path" 
                        >
                        <div class="col-md-4 container_feature_image">
                            <div class="row">
                                <img class="feature_image" src="{{  $product->feature_image_path }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Ảnh chi tiết sản phẩm </label>
                        <input type="file"
                               multiple
                               class="form-control-file"
                               name="image_path[]" 
                        >
                        <div class="col-md-12 container_image_product" >
                            <div class="row">
                                @foreach($product->images as $productImageItem)
                                    <div class="col-md-4">
                                        <img class="image_detail_product" src="{{  $productImageItem->image_path }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Chon danh muc</label>
                        <select class="form-control danhmuc_selected2" name="category_id">
                        <option value="">Chon danh muc</option>
                        <!-- dua 2 dau !! truoc va sau chuoi string de no hieu -->
                        {!!  $htmlOption !!} 
                        </select>
                    </div>

                    <div class="form-group">
                        <label >Nhập tags</label>
                        <select class="form-control tags_select_choose" multiple="multiple" name="tags[]">
                            @foreach($product->tags as $tagItem)
                            <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                            @endforeach
                        </select>
                    </div>                   
            </div>
            <div class="col-md-12">
                        <div class="form-group">
                            <label>Nhập nội dung</label>
                            <textarea class="form-control tinymce_editor_init" name="content" rows="10">{{  $product->content }}</textarea>
                            
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
    <script src="https://cdn.tiny.cloud/1/muq3ewk9282l1n7wrp7xu3wmreb9h9xyekl5ep63f1m7sgou/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{  asset('admins/product/add/add.js') }}"></script>
@endsection


    