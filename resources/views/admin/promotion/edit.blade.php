@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>{{ $promotion->title}}</title>

@endsection

@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection



@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Promotions','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('promotions.update',['id'=> $promotion->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Tên khuyến mãi</label>
                        <input type="text" class="form-control " 
                        placeholder="Nhập tên khuyến mãi"
                        name = "title"
                        value="{{ $promotion->title}}"
                        >
                        <div>
                         
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Tóm tắt khuyến mãi</label>
                        <input type="text" class="form-control" 
                        placeholder="Nhập tóm tắt khuyến mãi"
                               name = "desc"
                               value="{{ $promotion->desc}}"
                        >
                        <div>
                         
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Ảnh khuyến mãi</label>
                        <input type="file" class="form-control-file" 
                               name = "feature_image_path"
                        >
                        <img src="{{$promotion->feature_image_path}}" alt="" class="" height="200" width="200">
                    </div>
                    </div>
                      <div class="col-md-9">
                        <div class="form-group">
                          <label >Nội dung khuyến mãi</label>
                          <textarea class="form-control my-editor  " 
                          name="content" rows="8" >{{ $promotion->content}}</textarea>
                          <div>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Chọn banner hiển thị </label>
                          <select class="form-control" name="slider_id" >
                            <option value="">Chọn banner</option>
                            @foreach($banners as $banner)
                            <option value="{{$banner->id}}">{{$banner->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Giới thiệu khuyến mãi</label>
                          <input type="text" class="form-control" 
                          placeholder="Nhập giới thiệu khuyến mãi"
                                 name = "meta_desc"
                                 value="{{ $promotion->meta_desc}}"
                          >
                          <div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Từ khóa khuyến mãi</label>
                          <input type="text" class="form-control" 
                          placeholder="Nhập từ khóa cho khuyến mãi"
                                 name = "meta_keyword"
                                 value="{{ $promotion->meta_keyword}}"
                          >
                          <div>
                           
                          </div>
                        </div>
                      </div>
                      
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">Update</button>
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
 