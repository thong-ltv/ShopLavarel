@extends('layouts.admin') 

@section('title')

    <title>Settings Edit</title>

@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Setting', 'key' => 'Edit']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{  route('settings.update', [ 'id' =>  $typeSetting->id ]) }}" method="POST" enctype="multipart/form-data">
                    @csrf <!--   muon submit form can them @csrf -->
                    <div class="form-group">
                        <label >Config Key</label>
                        <input type="text" 
                               class="form-control @error('config_key') is-invalid @enderror"
                               name="config_key" 
                               placeholder="Nhap config key"
                               value="{{  $typeSetting->config_key }}"
                        >
                        @error('config_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($typeSetting->type === "Text")
                        <div class="form-group">
                            <label >Config Value</label>
                            <input  
                                class="form-control @error('config_value') is-invalid @enderror"
                                name="config_value" 
                                placeholder="Nhap config value"
                                value="{{  $typeSetting->config_value }}"
                            >
                            @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @elseif($typeSetting->type === "Textarea")
                        <div class="form-group">
                            <label >Config Value</label>
                            <textarea 
                                class="form-control @error('config_value') is-invalid @enderror"
                                name="config_value" 
                                placeholder="Nhap config value"
                                rows="4"
                            >{{  $typeSetting->config_value }}</textarea>
                            @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

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


    