@extends('layouts.admin') 

@section('title')

    <title>Trang chu</title>

@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Categpry', 'key' => 'Edit']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{  route('catogories.update', ['id' => $category->id]) }}" method="POST">
                    @csrf <!--   muon submit form can them @csrf -->
                    <div class="form-group">
                        <label >Ten danh muc</label>
                        <input type="text" 
                               class="form-control"
                               name="name"
                               value="{{  $category->name }}" 
                               placeholder="Nhap ten danh muc"
                        >
                    </div>
                    <div class="form-group">
                        <label >Chon danh muc cha</label>
                        <select class="form-control" name="parent_id">
                        <option value="0">Chon danh muc cha</option>
                        <!-- dua 2 dau !! truoc va sau chuoi string de no hieu -->
                        {!!  $htmlOption !!} 
                        </select>
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


    