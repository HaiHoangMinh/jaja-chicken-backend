@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang quản lý role</title>

@endsection

@section('css')
    <link rel="stylesheet" href="">

@endsection
@section('js')
  <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
  <script src="{{asset('admins/product/index/list.js')}}"></script>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',[ 'name' => 'role','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('roles.create')}}" class="btn btn-success float-right m-3">Thêm mới</a>
          </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên vai trò</th>
                <th scope="col">Mô tả vai trò</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                 
                @foreach ($roles as $roleItem)
                <tr>
                  <th scope="row">{{$roleItem->id}}</th>
                  <td>{{$roleItem->name}} </td>
                  <th>{{$roleItem->display_name}}</th>
                  <td>
                    <a href="{{ route('roles.edit', ['id'=> $roleItem->id]) }}" class="btn btn-default ">Edit</a>
                    
                    <a href="{{ route('roles.delete', ['id'=> $roleItem->id]) }}" class="btn btn-danger ">Delete</a>
                  </td>
                  </tr>
              
            </td>
            </tr>
          @endforeach


            </tbody>
          </table>
        
        
        
        </div>
        <div class="col-md-12">
          {{ $roles->links()}} 
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 