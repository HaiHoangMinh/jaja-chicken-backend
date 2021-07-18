@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Quản lý user</title>

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
    @include('partials.content-header',[ 'name' => 'Users','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('users.create')}}" class="btn btn-success float-right m-3">Thêm mới</a>
          </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Username</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                 
                @foreach ($users as $user)
                <tr>
                  <th scope="row">{{$user->id}}</th>
                  <td>{{$user->name}} </td>
                  <th>{{$user->username}}</th>
                   
                  <td>
                    <a href="{{ route('users.edit', ['id'=> $user->id]) }}" class="btn btn-default ">Edit</a>
                    
                    <a data-url="{{ route('users.delete', ['id'=> $user->id]) }}"
                    href="" class="btn btn-danger action_delete ">Delete</a>
                  </td>
                  </tr>
              
            </td>
            </tr>
          @endforeach


            </tbody>
          </table>
        
        
        
        </div>
        <div class="col-md-12">
          {{ $users->links()}} 
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 