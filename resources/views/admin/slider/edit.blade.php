@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Sửa Slide</title>

@endsection

@section('content')
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Menu','key' =>'Edit'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('slider.update',['id' => $sliders->id])}}" method="POST">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="form-group">
                      <label >Tên slider</label>
                      <input type="text" class="form-control" placeholder="Nhập tên danh mục"
                             name = "name"
                             value="{{ $sliders->name}}"
                      >
                    </div>
                    <div class="form-group">
                      <label >Mô tả slider</label>
                      <input type="text" class="form-control" placeholder="Nhập tên danh mục"
                             name = "description"
                             value="{{ $sliders->name}}"
                      >
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Ảnh slider</label>
                        <input type="file" class="form-control-file" 
                               name = "image_path"
                        >
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <img src="{{$sliders->image_path}}" alt="">
                      </div>        
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 