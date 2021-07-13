@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang mã giảm giá</title>

@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',[ 'name' => 'Coupon','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('coupons.create')}}" class="btn btn-success float-right m-3">Thêm mới</a>
          </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên mã giảm giá</th>
                <th scope="col">Mã giảm giá</th>
                <th scope="col">Số lượng mã</th>
                <th scope="col">Tính năng mã</th>
                <th scope="col">Số tiền giảm</th>
                <th scope="col">Ngày bắt dầu</th>
                <th scope="col">Ngày kết thúc</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($coupons as $coupon)
                  <tr>
                <th scope="row">{{ $coupon->id }}</th>
                <td>{{ $coupon->coupon_name }}</td>
                <td>{{ $coupon->coupon_code }}</td>
                <td>{{ $coupon->coupon_time }}</td>
                <td>{{ $coupon->coupon_condition }}</td>
                <td>{{ $coupon->coupon_number }}</td>
                <td>{{ $coupon->date_start }}</td>
                <td>{{ $coupon->date_end }}</td>
                @if($coupon->coupon_status == 1)
                  <td style="color: green">Còn</td>
                @else 
                     <td style="color: red">Hết</td>
                @endif
                <td>
                  {{-- <a href="{{ route('coupons.edit', ['id'=> $coupon->id]) }}" class="btn btn-default ">Edit</a> --}}
                  <a href="{{ route('coupons.delete', ['id'=> $coupon->id]) }}" class="btn btn-danger ">Delete</a>
                </td>
                </tr>
              @endforeach

            </tbody>
          </table>
        
        
        
        </div>
        <div class="col-md-12">
            {{ $coupons->links()}}
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 