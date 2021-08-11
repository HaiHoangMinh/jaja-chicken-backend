@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Thêm mã giảm giá</title>

@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Coupon','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('coupons.store')}}" method="POST">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="form-group">
                      <label >Tên mã giảm giá</label>
                      <input type="text" class="form-control" placeholder="Nhập tên mã giảm giá"
                             name = "coupon_name"
                      >
                    </div>
                    <div class="form-group">
                        <label >Mã giảm giá</label>
                        <input type="text" class="form-control" placeholder="Nhập mã giảm giá"
                               name = "coupon_code"
                        >
                    </div>
                      <div class="form-group">
                        <label >Số lượng</label>
                        <input type="number" class="form-control" placeholder="Nhập số lượng mã giảm giá"
                               name = "coupon_time"
                        >
                    </div>
                   
                    <div class="form-group">
                        <label >Tính năng mã</label>
                        <select class="form-control" name="coupon_condition" >
                        
                          <option value="1">Giảm theo %</option>
                          <option value="2">Giảm tiền</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label >Số % hoặc tiền giảm</label>
                        <input type="number" class="form-control" placeholder="Nhập số giảm của mã giảm giá"
                               name = "coupon_number"
                        >
                    </div>
                    <div class="form-group">
                      <label >Đơn hàng tối thiểu</label>
                      <input type="number" class="form-control" placeholder="Nhập giá trị đơn hàng tối thiểu"
                             name = "limit_bills"
                      >
                  </div>
                    <div class="form-group">
                      <label >Ngày bắt đầu</label>
                      <input type="text" class="form-control" placeholder="Ngày bắt đầu"
                             name = "date_start" id="datepicker"
                      >
                  </div>
                  <div class="form-group">
                    <label >Ngày kết thúc</label>
                    <input type="text" class="form-control" placeholder="Ngày kết thúc"
                           name = "date_end" id="datepicker2"
                    >
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
  
 