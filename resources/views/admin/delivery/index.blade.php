@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang quản lý phí ship</title>

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
    @include('partials.content-header',[ 'name' => 'FeeShip','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{URL::to('add-delivery')}}" class="btn btn-success float-right m-3">Thêm mới</a>
          </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tỉnh/Thành phố</th>
                <th scope="col">Quận/huyện</th>
                <th scope="col">Phường/xã</th>
                <th scope="col">Phí ship</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                 
                @foreach ($fee_ship as $item)
                <tr>
                  <th scope="row">{{$item->id}}</th>
                  <td>{{$city->find($item->fee_matp)->name}} </td>
                  <th>{{$province->find($item->fee_maqh)->name}}</th>
                  <th>{{$wards->find($item->fee_xaid)->name}}</th>
                  <th>{{$item->fee_feeship}}</th>
                  <td>
                    <a href="{{ route('roles.edit', ['id'=> $item->id]) }}" class="btn btn-default ">Edit</a>
                    
                    <a href="{{ route('roles.delete', ['id'=> $item->id]) }}" class="btn btn-danger ">Delete</a>
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
  
 