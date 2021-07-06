@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Thêm slide mới</title>

@endsection


@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Slider','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="form-group">
                      <label >Tên slider</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Nhập tên slider"
                             name = "name"
                             value="{{old('name')}}"
                      >
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div   >
                    <div class="form-group">
                        <label >Mô tả</label>
                         <textarea class="form-control @error('content') is-invalid @enderror " 
                            name="description" rows="8" >{{ old('description')}}</textarea>
                        <div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror     
                          </div>
                      <div class="form-group">
                        <label >Hình ảnh</label>
                        <input type="file" class="form-control-file @error('name') is-invalid @enderror"
                               name = "image_path"
                        >
                        @error('image_path')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
  
 