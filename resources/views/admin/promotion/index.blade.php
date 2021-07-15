@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang quản lý khuyến mãi</title>

@endsection

{{-- Import css-js --}}
@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/list.css')}}"> 
@endsection

@section('js')
  <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
  <script src="{{asset('admins/product/index/list.js')}}"></script>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',[ 'name' => 'Promotions','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('promotions.create')}}" class="btn btn-success float-right m-3">Thêm mới</a>
          </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khuyến mãi</th>
                <th scope="col">Tóm tắt khuyến mãi</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Banner</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($promotions as $promotionItem)
              <tr>
            <th scope="row">{{ $promotionItem->id }}</th>
            <td>{{ $promotionItem->title }}</td>
            {{-- number_format: Ep kieu du lieu sang number --}}
            <td>{{ $promotionItem->desc }}</td> 
            <td><img src="{{$promotionItem->feature_image_path}}" alt="" class="product_image_150_100"></td>
            {{-- optional: Kiem tra data null hay ko de tranh bug --}}
            <td>{{ $promotionItem->slider_id }}</td>

            <td>
              <a href="{{ route('promotions.edit', ['id'=> $promotionItem->id]) }}" class="btn btn-default ">Edit</a>
              <a 
              {{-- data-url: Sinh duong dan url truy xuat --}}
              data-url="{{ route('promotions.delete', ['id'=> $promotionItem->id]) }}"
              href="" class="btn btn-danger action_delete ">Delete</a>
            </td>
            </tr>
          @endforeach

            </tbody>
          </table>
        
        
        
        </div>
        <div class="col-md-12">
           {{-- Link phan trang --}}
          {{ $promotions->links()}} 
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 