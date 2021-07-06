@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang quản lý hóa đơn</title>

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
    @include('partials.content-header',[ 'name' => 'Bills','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('bills.export')}}" class="btn btn-success float-right m-3">Xuất hóa đơn</a>
          </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">khách hàng</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Tổng thanh toán</th>
                <th scope="col">Hình thức thanh toán</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                 
                @foreach ($bills as $bill)
                <tr>
                  <th scope="row">{{$bill->id}}</th>
                  <td>{{$customers->find($bill->customer_id)->name}} </td>
                  <td>{{$customers->find($bill->customer_id)->address}} </td>
                  <th>{{$bill->date_order}}</th>
                  <th>{{number_format($bill->total)}}</th>
                  <th>{{$bill->payment}}</th>
                  <th>{{$bill->note}}</th>
                   
                  <td>
                    <a href="{{ route('bills.detail', ['id'=> $bill->id]) }}" class="btn btn-default ">Chi tiết</a>
                    
                    <a data-url="{{ route('bills.delete', ['id'=> $bill->id]) }}"
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
          {{ $bills->links()}} 
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 