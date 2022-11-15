@extends('layouts.admin') 

@section('title')

    <title>Permissions Add</title>

@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Permission', 'key' => 'Add']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{  route('permissions.store') }}" method="POST">
                    @csrf <!--   muon submit form can them @csrf -->
                    <div class="form-group">
                        <label >Chọn tên module</label>
                        <select class="form-control" name="module_parent">
                            <option value="">Chọn tên module</option>
                            @foreach(config('permissions.modules_table') as $moduleItem)
                                <option value="{{  $moduleItem }}">{{  $moduleItem }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                        @foreach(config('permissions.modules_children') as $moduleItem)
                            <div class="col-md-3">
                                <label for="">
                                    <input type="checkbox" value="{{  $moduleItem }}" name="module_children[]">
                                    {{  $moduleItem }} 
                                </label>
                            </div>
                        @endforeach
                        </div>
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


    