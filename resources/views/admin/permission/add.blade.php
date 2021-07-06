@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang thêm permission</title>

@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Permission','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('permissions.store')}}" method="POST">
                  @csrf
                  {{-- Sinh ra token bao mat --}}
                    
                    <div class="form-group">
                        <label >Chọn phân quyền </label>
                        <select class="form-control" name="module_parent" >
                          <option value="">Chọn trường phân quyền</option>
                          @foreach (config('permissions.table-module') as $item)
                            <option value="{{$item}}">{{$item}}</option>

                          @endforeach

                        </select>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          @foreach (config('permissions.module-childrent') as $item)
                          <div class="col-md-3">
                            <label for="">
                              <input type="checkbox" value="{{$item}}" name="module_childrent[]">
                              {{$item}}
                            </label>
                          </div>
                          @endforeach
                          
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
  
 