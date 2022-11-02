@extends('layouts.admin')

@section('title')

    <title>Setting</title>

@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('admins/setting/index/index.css')}}">
@endsection

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content_header', ['name' => 'Settings', 'key' => 'List']);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="dropdown">
            <a class="btn btn-secondary btn-success dropdown-toggle dropdowns-setting " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Add Settings
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="{{ route('settings.create') . '?type=Text' }}">Text</li>
              <li><a class="dropdown-item" href="{{ route('settings.create') .'?type=Textarea' }}">Textarea</a></li>
            </ul>
          </div>
              
          </div>

          <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Config Key</th>
                    <th scope="col">Config Value</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                   @foreach($settings as $setting)
                        <tr>
                        <th scope="row">{{ $setting -> id }}</th>
                        <td>{{ $setting -> config_key }}</td>
                        <td>{{ $setting -> config_value }}</td>
                        <td>
                            <a href="{{ route('settings.edit', [ 'id' => $setting -> id ]) }}" class="btn btn-default">Edit</a>
                            <a href="{{ route('settings.delete', [ 'id' => $setting -> id ]) }}"
                               onclick="return confirm('Ban co that su muon xoa?')" 
                               class="btn btn-danger">Delete</a>
                        </td>
                  @endforeach
          

                </tbody>
            </table>
          </div>

          <div class="col-lg-12">
             {{ $settings ->links() }}
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@section('js')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection

@endsection


    