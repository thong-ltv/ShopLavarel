@extends('layouts.admin')

@section('title')

    <title>Add Product</title>

@endsection
@section('css')

   <link rel="stylesheet" href="{{  asset('admins/product/index/list.css') }}">

@endsection
@section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="{{  asset('admins/product/index/list.js') }}"></script>
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Product', 'key' => 'List']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <a href="{{  route('products.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>

          <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Màu sắc</th>
                    <th scope="col">Kích thước</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                  @foreach($products as $productItem)

                    <tr>
                    <th scope="row">{{  $productItem->id }}</th>
                    <td>{{  $productItem->name }}</td>
                    <td>{{  number_format($productItem->price) }}</td>
                    <td>
                      <img class="productImage_150_100" src="{{  $productItem->feature_image_path }}" alt="">
                    </td>

                    <p hidden>
                      {{  $textColors = ''; }}
                      @foreach($productItem -> colors as $productItemColor )
                      {{  $textColors .= $productItemColor->name .', ' }}
                      @endforeach
                    </p>
                    <td>{{ $textColors }}</td>

                    <p hidden>
                      {{  $textSizes = ''; }}
                      @foreach($productItem -> sizes as $productItemSize )
                      {{  $textSizes .= $productItemSize->name .', ' }}
                      @endforeach
                    </p>
                    <td>{{ $textSizes }}</td>

                    <td>{{  optional($productItem->category)->name }}</td>  
                    <td>
                          <a href="{{  route('products.edit', ['id' => $productItem->id]) }}" class="btn btn-default">Edit</a>
                          <a href="{{  route('products.delete', ['id' => $productItem->id]) }}"
                            OnClick="return confirm('Ban co that su muon xoa?');"
                            data-url = "{{  route('products.delete', ['id' => $productItem->id]) }}"
                            class="btn btn-danger">Delete</a>
                    </td>

                  @endforeach


                </tbody>
            </table>
          </div>

          <div class="col-lg-12">
            {{  $products->links() }}   <!--   phan trang paginate -->
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


    