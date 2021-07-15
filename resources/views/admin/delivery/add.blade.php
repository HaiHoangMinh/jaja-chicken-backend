@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Thêm mã giảm giá</title>

@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'FeeShip','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST">
                  @csrf
                    <div class="form-group">
                        <label >Chọn tỉnh</label>
                        <select class="form-control choose city" name="city" id="city" >
                          <option value="">Chọn tỉnh/thành phố</option>
                          @foreach($city as $item)
                          <option value="{{$item->matp}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label >Chọn quận/huyện</label>
                        <select class="form-control choose province" name="province" id="province" >
                          <option value="">Chọn quận huyện</option>
                          
                        </select>
                      </div>
                    <div class="form-group">
                        <label >Chọn xã/phường</label>
                        <select class="form-control wards" name="wards" id="wards" >
                          <option value="">Chọn xã phường</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label >Phí vận chuyển</label>
                        <input type="text" class="form-control fee_ship" placeholder="Phí vận chuyển"
                               name = "fee_ship"
                        >
                    </div>
                    <button type="button" class="btn btn-primary add_delivery" name="add_delivery">Thêm phí vận chuyển</button>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
  
 