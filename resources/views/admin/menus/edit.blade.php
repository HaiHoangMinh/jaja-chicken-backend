@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Menu','key' =>'Edit'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('menus.update',['id' => $menu->id])}}" method="POST">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="form-group">
                      <label >Tên món ăn</label>
                      <input type="text" class="form-control" placeholder="Nhập tên danh mục"
                             name = "name"
                             value="{{ $menu->name}}"
                      >
                    </div>
                    <div class="form-group">
                        <label >Chọn nhóm món ăn</label>
                        <select class="form-control" name="parent_id" >
                          <option value="0">Chọn nhóm món ăn</option>
                          {!! $optionSelect !!}
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  
 