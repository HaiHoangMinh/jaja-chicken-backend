@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Thêm món ăn mới</title>

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
                        <label >Tên món ăn</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                        placeholder="Nhập tên món ăn"
                        name = "name"
                        value="{{ old('name')}}"
                        >
                        <div>
                          @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Giá món ăn</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                        placeholder="Nhập giá món ăn"
                               name = "price"
                               value="{{ old('price')}}"
                        >
                        <div>
                          @error('price')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Ảnh món ăn</label>
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
                        <select class="form-control select2_init " 
                          name="category_id" >
                          <option value="">Chọn danh mục</option>
                          {!! $htmlOption !!}
                        </select>
                        <div>
                          @error('category_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Nhập tags cho món ăn</label>
                        <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">
                        </select>
                    </div>
                    </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label >Mô tả món ăn</label>
                          <textarea class="form-control my-editor @error('content') is-invalid @enderror " 
                          name="content" rows="8" >{{ old('content')}}</textarea>
                          <div>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
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
 