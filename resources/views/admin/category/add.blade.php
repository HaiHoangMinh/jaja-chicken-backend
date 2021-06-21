@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Category','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('categories.store')}}" method="POST">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="form-group">
                      <label >Tên danh mục</label>
                      <input type="text" class="form-control" placeholder="Nhập tên danh mục"
                             name = "name"
                      >
                    </div>
                    <div class="form-group">
                        <label >Chọn danh mục</label>
                        <select class="form-control" name="parent_id" >
                          <option value="0">Chọn nhóm thực đơn</option>
                          {!! $htmlOption !!}
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
  
 