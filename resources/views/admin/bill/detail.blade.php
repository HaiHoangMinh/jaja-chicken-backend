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
    <br/>
    <div class="col-md-12">
      <a href="{{route('bills.export')}}" class="btn btn-success float-right m-3">Xuất hóa đơn</a>
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            <table class="table">
              <thead>
                <h4>Thông tin hóa đơn</h4>
                <tr>
                  <th scope="col">Hóa đơn số</th>
                  <th scope="col">Ngày đặt</th>
                  <th scope="col">Đơn giá</th>
                  <th scope="col">Trạng thái</th>
                </tr>
              </thead>
              <tbody>
                   

                  <tr>
                    <th scope="row">{{$bill->id}}</th>
                    <td>{{$bill->date_order}} </td>
                    <td>{{number_format($bill->total)}} </td>
                    <th>{{$bill->status}}</th>
        
                     
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
                <h4>Danh sách món ăn</h4>
                <tr>
                  <th scope="col">Món ăn</th>
                  <th scope="col">Đơn giá</th>
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
          
          
          
          </div>
    
          </div>
        </div>
    </div>
  </div>
@endsection
  
 