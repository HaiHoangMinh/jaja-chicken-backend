@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Thêm user</title>
@endsection

@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script>
    $('.select2_init').select2({
      'placeholder' : 'Chọn vai trò'
    });
</script>
@endsection



@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Users','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="form-group">
                      <label >Tên user</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Nhập họ tên User"
                             name = "name"
                             value="{{old('name')}}"
                      >
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <label >Username</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Nhập username"
                             name = "username"
                             value="{{old('username')}}"
                      >
                    @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <label >Password</label>
                      <input type="password" class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Nhập password"
                             name = "password"
                             value="{{old('password')}}"
                      >
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Ảnh đại diện</label>
                        <input type="file" class="form-control-file" 
                               name = "feature_image_path"
                        >
                    </div>
                    </div>
                    <div class="form-group">
                      <label >Chọn vai trò</label>
                      <select class="form-control select2_init " name="role_id[]" multiple >
                        <option value=""></option>
                        @foreach ($roles as $role)
                          <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                      </select>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>

  
@endsection
  
 