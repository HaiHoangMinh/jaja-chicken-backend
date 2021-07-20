@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Chi tiết hóa đơn</title>

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
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{URL::to('/print-bill/'.$bill->id)}}" class="btn btn-success float-right m-3">Xuất hóa đơn</a>
          </div>
        </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <center><h4>THÔNG TIN ĐƠN HÀNG</h4></center>
                <tr>
                  <th scope="col">Hóa đơn số</th>
                  <th scope="col">Khách hàng</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Ngày đặt</th>
                  <th scope="col">Ghi chú</th>
                  <th scope="col">Tình trạng đơn hàng</th>
                </tr>
              </thead>
              <tbody>
                   

                  <tr>
                    <td scope="row">{{$bill->id}}</td>
                    <?php
                  if($bill->customer_id != null)
                  {
                  ?>
                  <td>{{$customers->find($bill->customer_id)->name}} </td>
                  <td>{{$customers->find($bill->customer_id)->phone_number}} </td>
                  <?php
                  } else {
                  ?>
                  <td>{{$shippings[$bill->shipping_id-1]->shipping_name}} </td>
                  <td>{{$shippings[$bill->shipping_id-1]->shipping_phone}} </td>
                  <?php
                  }
                  ?>
                    <td>{{$bill->date_order}} </td>
                    <th>{{$bill->note}}</th>
                    @if($bill->status == 1)
                    <td>Đang chuẩn bị đơn hàng</td>
                    @elseif($bill->status == 2)
                    <td>Đang giao</td>
                    @elseif($bill->status == 3)
                    <td>Đã giao</td>
                    @else 
                    <td>Đã bị hủy</td>
                    @endif
                    <td>
                      
                    </td>
                    </tr>
                
              </td>
              </tr>
  
  
              </tbody>
            </table>
          
          
          
          </div>

          <div class="col-md-12">
            <table class="table">
              <thead>
                <center><h4>DANH SÁCH MÓN ĂN ĐÃ ĐẶT</h4></center>
                <tr>
                  <th scope="col">Món ăn</th>
                  <th scope="col">Giá món ăn</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                   
                  @foreach ($billDetails as $billDetail)
                  <tr>
                    <td>{{$products->find($billDetail->product_id)->name}} </td>
                    <td>{{number_format($products->find($billDetail->product_id)->price)}} </td>
                    <th>{{$billDetail->quantity}}</th>
                    <td>{{number_format($products->find($billDetail->product_id)->price * $billDetail->quantity)}} </td>
                    <td>
                    </td>
                    </tr>
                
              </td>
              </tr>
            @endforeach
             
  
              </tbody>
              
            </table>
            <span>Tổng thanh toán:</span>
            <span>{{number_format($bill->total)}} VNĐ</span> 
          
          
          </div>

        </div>
    </div>
  </div>
@endsection
  
 