@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Menu','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('menus.store')}}" method="POST">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    <div class="form-group">
                      <label >Tên menu</label>
                      <input type="text" class="form-control" placeholder="Nhập tên menu"
                             name = "name"
                      >
                    </div>
                    <div class="form-group">
                        <label >Chọn nhóm </label>
                        <select class="form-control" name="parent_id" >
                          <option value="0">Chọn nhóm món ăn</option>
                          {!! $optionSelect !!}
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
  
 