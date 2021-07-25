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
          {{-- <div class="col-md-12">
            <a href="{{route('bills.export')}}" class="btn btn-success float-right m-3">Thống kê hóa đơn</a>
          </div> --}}
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Số HĐ</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Địa chỉ giao hàng</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Thanh toán</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                 
                @foreach ($bills as $bill)
                <tr>
                  <th scope="row">{{$bill->id}}</th>
                  <?php
                  if($bill->customer_id != null)
                  {
                  ?>
                  <td>{{$customers->find($bill->customer_id)->name}} </td>
                  <td style="font-size: 13px">{{$customers->find($bill->customer_id)->address}} </td>
                  <?php
                  } else {
                  ?>
                  <td>{{$shippings[$bill->shipping_id-1]->shipping_name}} </td>
                  <td style="font-size: 13px">{{$shippings[$bill->shipping_id-1]->shipping_address}} </td>
                  <?php
                  }
                  ?>
                  <th>{{number_format($bill->total)}}</th>
                  <?php
                  if($payments[$bill->payment_id-1]->payment_method == 1)
                  {
                  ?>
                  <td>Tiền mặt</td>
                  <?php
                  } else {
                  ?>
                  <td>Thẻ ATM
                      <br>Mã GD:{{$payments[$bill->payment_id-1]->code_vnpay}}
                      <br>Số tiền:{{$payments[$bill->payment_id-1]->money}}
                      <br>Ngân hàng: {{$payments[$bill->payment_id-1]->code_bank}}
                  </td>
                  
                  <?php
                  }
                  ?>
                  
                  @if($bill->status == 1)
                  <td>Đang làm
                    <br/><a href="{{ route('bills.update', ['id'=> $bill->id]) }}">
                      Cập nhật</a>
                  </td>
                  @elseif($bill->status == 2)
                  <td>Đang giao
                    <br/><a href="{{ route('bills.update', ['id'=> $bill->id]) }}">
                      Cập nhật</a>
                  </td>
                  @elseif($bill->status == 3)
                  <td>Đã giao</td>
                  @else 
                  <td>Đã bị hủy</td>
                  @endif
                  
                  <td>
                    <a href="{{ route('bills.detail', ['id'=> $bill->id]) }}" class="btn btn-default ">Chi tiết</a>
                    @if ($bill->status == 1)
                        <a href="{{ route('bills.cancel', ['id'=> $bill->id]) }}" class="btn btn-danger ">
                        Hủy</a>
                    @endif
                    <a data-url="{{ route('bills.delete', ['id'=> $bill->id]) }}"
                    href="" class="btn btn-danger action_delete ">Xóa</a>
                    
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
  
 