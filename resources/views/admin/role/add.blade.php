@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang thêm roles</title>

@endsection

@section('js')
    <script>
      $('.checkbox_wrapper').on('click',function () {
        $(this).parents('.card').find('.checkbox_childrent').prop('checked',$(this).prop('checked'))
      });
    </script>
@endsection



@section('content')
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
@include('partials.content-header',[ 'name' => 'Role','key' =>'Add'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data" style="width:100%">
          @csrf
          <div class="col-md-12">
            {{-- Sinh ra token bao mat --}}
              <div class="form-group">
                <label >Tên vai trò</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                      placeholder="Nhập tên role"
                       name = "name"
                       value="{{old('name')}}"
                >
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
              <div class="form-group">
                  <label >Mô tả vai trò</label>
                   <textarea class="form-control @error('display_name') is-invalid @enderror " 
                      name="display_name" rows="8" >{{ old('display_name')}}</textarea>
                  @error('display_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror     
              </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">

              @foreach($permissionParent as $permissionParentItem)
              <div class="card border-primary mb-3 col-md-12" style="background-color: green" >
                <div class="card-header"  >
                  <label >
                    <input type="checkbox" value="" class="checkbox_wrapper" >
                    {{$permissionParentItem->name}}</label>
                </div>
                <div class="row" style="background-color: white">
                  @foreach($permissionParentItem->permissionsChildrent as $permissionParentItemChildrent)
                  <div class="card-body text-primary col-md-3">
                    <h5 class="card-title">
                      <label for="">
                        <input type="checkbox" value="{{$permissionParentItemChildrent->id}}" 
                        name="permission_id[]" class="checkbox_childrent">
                        {{$permissionParentItemChildrent->name}}</label>
                    </h5>
                    
                  </div>
                  @endforeach
                </div>
              </div>
              @endforeach
              </div>

          </div> 
          <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Create</button>
          </div>  
              
          
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
  
 