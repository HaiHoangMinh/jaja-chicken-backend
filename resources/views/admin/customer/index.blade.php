@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang quản lý khách hàng</title>

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
    @include('partials.content-header',[ 'name' => 'Customers','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Email</th>
                <th scope="col">SĐT</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                 
                @foreach ($customers as $customer)
                <tr>
                  <th scope="row">{{$customer->id}}</th>
                  <td>{{$customer->name}} </td>
                  <th>{{$customer->email}}</th>
                  <th>{{$customer->phone_number}}</th>
                  <th>{{$customer->address}}</th>
                   
                  <td>
                    <a href="{{ route('customers.history', ['id'=> $customer->id]) }}" class="btn btn-default ">Xem TT</a>
                    <a href="{{ route('customers.delete', ['id'=> $customer->id]) }}" class="btn btn-danger ">Delete</a>
                  </td>
                  </tr>
              
            </td>
            </tr>
          @endforeach


            </tbody>
          </table>
        
        
        
        </div>
        <div class="col-md-12">
          {{ $customers->links()}} 
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 