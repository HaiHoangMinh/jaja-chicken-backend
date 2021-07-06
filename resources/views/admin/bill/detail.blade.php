@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang chi tiết hóa đơn</title>

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
    @include('partials.content-header',[ 'name' => 'Chi tiết','key' =>'hóa đơn'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Hóa đơn số</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
              </tr>
            </thead>
            <tbody>
                 
                @foreach ($billDetails as $billDetail)
                <tr>
                  <th scope="row">{{$billDetail->id}}</th>
                  <td>{{$bills->find($billDetail->order_id)->id}} </td>
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
        
        
        
        </div>
        <div class="col-md-12">
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 