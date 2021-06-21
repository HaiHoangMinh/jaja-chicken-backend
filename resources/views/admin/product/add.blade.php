@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Thêm sản phẩm mới</title>

@endsection

@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection



@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Products','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Tên sản phẩm</label>
                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm"
                               name = "name"
                        >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Giá sản phẩm</label>
                        <input type="text" class="form-control" placeholder="Nhập giá sản phẩm"
                               name = "price"
                        >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Ảnh sản phẩm</label>
                        <input type="file" class="form-control-file" 
                               name = "feature_image_path"
                        >
                    </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Ảnh chi tiết</label>
                        <input type="file" class="form-control-file" 
                               name = "image_path[]"
                               multiple
                        >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Chọn danh mục</label>
                        <select class="form-control select2_init" name="category_id" >
                          <option value="">Chọn danh mục</option>
                          {!! $htmlOption !!}
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Nhập tags cho sản phẩm</label>
                        <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">
                        </select>
                    </div>
                    </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label >Mô tả sản phẩm</label>
                          <textarea class="form-control my-editor " name="content" rows="8" ></textarea>
                        </div>
                      </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
  
@section('js')

<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/product/add/add.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


@endsection
 