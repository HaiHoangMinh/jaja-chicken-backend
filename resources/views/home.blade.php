@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang chủ</title>

@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('partials.content-header',[ 'name' => 'Home','key' =>'page'])

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          Trang chủ
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
  
 