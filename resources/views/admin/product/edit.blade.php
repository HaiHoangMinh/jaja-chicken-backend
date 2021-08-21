@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Update món ăn</title>

@endsection

@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection



@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Products','key' =>'Edit'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('products.update',['id'=> $product->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Tên món ăn</label>
                        <input type="text" class="form-control" placeholder="Nhập tên món ăn"
                               name = "name"
                               value="{{$product->name}}"
                        >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Giá món ăn</label>
                        <input type="number" class="form-control" placeholder="Nhập giá món ăn"
                               name = "price"
                               value="{{$product->price}}"
                        >
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
                    <div class="col-md-6">
                      <div class="form-group">
                          <img src="{{$product->feature_image_path}}" alt="" height="200" width="200">
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
                    <div class="col-md-12">
                        <div class="row">
                        <br/>
                        @foreach($product->productImages as $productImageItem)
                          <div class="col-md-3">
                              <img class="image_detail_product" src="{{$productImageItem->image_path}}" alt="" height="200" width="200">
                          </div>
                        @endforeach
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
                        <label >Nhập tags cho món ăn</label>
                        <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">
                        @foreach($product->tags as $tagItem)
                          <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label >Mô tả món ăn</label>
                          <textarea class="form-control my-editor " name="content" rows="8" >{{$product->content}}</textarea>
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
 