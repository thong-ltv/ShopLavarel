@extends('layouts.admin')

@section('title')

    <title>Slider</title>

@endsection

@section('css')
  <link rel="stylesheet" href="{{  asset('admins/slider/index/index.css') }}">
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Slider', 'key' => 'List']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <a href="{{  route('sliders.create') }}" class="btn btn-success float-right m-2">Add</a>
          </div>

          <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên Slider</th>
                    <th scope="col">Description</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                   @foreach($sliders as $slider)
                        <tr>
                        <th scope="row">{{ $slider->id }}</th>
                        <td>{{ $slider->name }}</td>
                        <td>{{ $slider->description}}</td>
                        <td>
                            <img class="imageSlider_150_100" src="{{ $slider->image_path}}" alt="">
                        </td>
                        <td>
                            <a href="{{ route('sliders.edit', [ 'id' => $slider->id ]) }}" class="btn btn-default">Edit</a>
                            <a href="{{ route('sliders.delete', [ 'id' => $slider->id])}}"
                               OnClick="return confirm('Ban co that su muon xoa?');"
                               class="btn btn-danger">Delete</a>
                        </td>
                    @endforeach

                </tbody>
            </table>
          </div>

          <div class="col-lg-12">
              {{ $sliders->links() }}
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


    