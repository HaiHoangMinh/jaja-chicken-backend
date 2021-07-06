@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Quản lý slide</title>

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
    @include('partials.content-header',[ 'name' => 'Slider','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('slider.create')}}" class="btn btn-success float-right m-3">Thêm mới</a>
          </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên slider</th>
                <th scope="col">Description</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                 
                @foreach ($sliders as $sliderItem)
                <tr>
                  <th scope="row">{{$sliderItem->id}}</th>
                  <td>{{$sliderItem->name}} </td>
                  <th>{{$sliderItem->description}}</th>
                  <td><img src="{{$sliderItem->image_path}}" alt="" height="150px" width="150px"></td> 
                  <td>
                    <a href="{{ route('slider.edit', ['id'=> $sliderItem->id]) }}" class="btn btn-default ">Edit</a>
                    
                    <a data-url="{{ route('slider.delete', ['id'=> $sliderItem->id]) }}"
                    href="" class="btn btn-danger action_delete ">Delete</a>
                  </td>
                  </tr>
              
            </td>
            </tr>
          @endforeach


            </tbody>
          </table>
        
        
        
        </div>
        <div class="col-md-12">
          {{ $sliders->links()}} 
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 