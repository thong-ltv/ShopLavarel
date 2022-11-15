@extends('layouts.admin') 

@section('title')

    <title>Roles Edit</title>

@endsection

@section('css')
    <link href="{{  asset('admins/role/add/add.css') }}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{  asset('admins/role/add/add.js') }}"></script>
@endsection



@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Role', 'key' => 'Edit']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <form action="{{ route('roles.update', ['id' => $role->id ])  }}" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                    
                    @csrf <!--   muon submit form can them @csrf -->
                    <div class="form-group">
                        <label >Ten Role</label>
                        <input type="text" 
                            class="form-control"
                            name="name" 
                            placeholder="Nhap ten Role"
                            value="{{  $role->name }}"
                        >
                        
                    </div>

                    <div class="form-group">
                        <label >Mo ta Role</label>
                        <textarea 
                            class="form-control"
                            name="display_name" rows="4">{{  $role->display_name }}</textarea>
                        
                    </div>

                        
                </div>

                <div class="col-md-12">
                    <label>
                        <input type="checkbox" class="checkall">
                        checkall
                    </label>
                </div>
                
                @foreach($permissionsParent as $permissionsParentItem )
                <div class="col-md-12">
                    <div class="row">
                        <div class="card border-primary mb-3 col-md-12">
                            <div class="card-header">
                                <label>
                                    <input type="checkbox" value="" class="checkbox_wrapper">
                                </label>    
                                Module {{ $permissionsParentItem->name }}
                            </div>
                            <div class="row">
                                @foreach($permissionsParentItem->permissionsChildren as $permissionsChildrenItem)
                                <div class="card-body text-primary">
                                    <h5 class="card-title">
                                        <label>
                                            <input type="checkbox" name="permission_id[]"
                                            {{  $permissionChecked->contains('id', $permissionsChildrenItem->id) ? "checked" : "" }}
                                            class="checkbox_childrent"
                                            value="{{ $permissionsChildrenItem->id }}">
                                        </label>
                                        {{ $permissionsChildrenItem->name  }}
                                    </h5>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

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


    