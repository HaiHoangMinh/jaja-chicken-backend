@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Thêm sản phẩm</title>

@endsection

{{-- Import css-js --}}
@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/list.css')}}"> 
@endsection

@section('js')
    <title>Thêm sản phẩm</title>

@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',[ 'name' => 'Products','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('products.create')}}" class="btn btn-success float-right m-3">Thêm mới</a>
          </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $productItem)
              <tr>
            <th scope="row">{{ $productItem->id }}</th>
            <td>{{ $productItem->name }}</td>
            {{-- number_format: Ep kieu du lieu sang number --}}
            <td>{{ number_format( $productItem->price) }}</td> 
            <td><img src="{{$productItem->feature_image_path}}" alt="" class="product_image_150_100"></td>
            {{-- optional: Kiem tra data null hay ko de tranh bug --}}
            <td>{{ optional($productItem->category)->name }}</td>
            <td>
              <a href="{{ route('products.edit', ['id'=> $productItem->id]) }}" class="btn btn-default ">Edit</a>
              <a href="{{ route('products.delete', ['id'=> $productItem->id]) }}" class="btn btn-danger ">Delete</a>
            </td>
            </tr>
          @endforeach

            </tbody>
          </table>
        
        
        
        </div>
        <div class="col-md-12">
           {{-- Link phan trang --}}
          {{ $products->links()}} 
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 