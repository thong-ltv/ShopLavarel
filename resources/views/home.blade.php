@extends('layouts.admin')

@section('title')

    <title>Trang chu</title>

@endsection

@section('css')

   <link rel="stylesheet" href="{{  asset('home/home.css') }}">

@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => '', 'key' => ''])
        <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12">
              <h1 class="text-center bolder text-danger">Chào mừng bạn đến với trang quản lý của FashionShop</h1>
              <div class="text-center">
                <img src="{{  asset('adminlte/dist/img/Checklist.jpg') }}" class="img-fluid img-thumbnail" alt="">
              </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


    