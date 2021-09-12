@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Lịch sử mua hàng</title>

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
            <a href="{{URL::to('/admin/customers')}}" class="btn btn-success float-right m-3">Quay lại</a>
        </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <center><h4>THÔNG TIN KHÁCH HÀNG</h4></center>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Email</th>
                  <th scope="col">Họ và tên</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Địa chỉ</th>
                </tr>
              </thead>
              <tbody>
                   

                  <tr>
                    <td scope="row">{{$customer->id}}</td>
                    <td>{{$customer->name}} </td>
                    <td>{{$customer->phone_number}} </td>
                    <td>{{$customer->address}} </td>
                    </tr>
                
              </td>
              </tr>
  
  
              </tbody>
            </table>
          
          
          
          </div>

          <div class="col-md-12">
            <table class="table">
              <thead>
                <center><h4>DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT</h4></center>
                <tr>
                  <th scope="col">Hóa đơn</th>
                  <th scope="col">Ngày đặt</th>
                  <th scope="col">Tổng tiền</th>
                  <th scope="col">Trạng thái</th>
                </tr>
              </thead>
              <tbody>
                   
                  @foreach ($bills as $bill)
                  <tr>
                    <td>{{$bill->id}} </td>
                    <td>{{$bill->date_order}} </td>
                    <th>{{number_format($bill->total)}}đ</th>
                    @if($bill->status == 1)
                  <td>Đang làm
                  </td>
                  @elseif($bill->status == 2)
                  <td>Đang giao
                  </td>
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
            @endforeach
             
  
              </tbody>
              
            </table>
          
          
          </div>

        </div>
    </div>
  </div>
@endsection
  
 