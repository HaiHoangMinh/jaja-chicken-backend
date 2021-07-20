@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Trang chủ JajaAdmin</title>

@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('partials.content-header',[ 'name' => 'Thông tin','key' =>'JAJA'])

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>15</h3>

                <p>Đơn hàng mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Thông tin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>98<sup style="font-size: 20px">%</sup></h3>

                <p>Đơn hàng hoàn thành</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>5</h3>

                <p>Khách hàng mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Số lượt truy cập</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

          <div class="col-md-12">
            <div class="card">
              <br>
                  <center><h3 class="title_thongke">THÔNG TIN CHI TIẾT</h3></center>
                  
              <form autocomplete="off">
                @csrf
                <div class="row">
                  <div class="col-md-3">
                    <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                  </div>
                  <div class="col-md-3">
                    <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
                  </div>
                  <div class="col-md-2">
                    <p>
                      Lọc theo
                      <select class="dashboard-filter form-control">
                        <option >--Chọn--</option>
                        <option value="7ngay">7 ngày qua</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="thangnay">Tháng này</option>
                        <option value="365ngayqua">Năm vừa rồi</option>
                        
                      </select>
                    </p>
                  </div>
                  <div class="col-md-2">
                    <input type="button" class="btn btn-default " id="btn-filter" value="Lọc">
                  </div>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
          </div>
       
        <!-- /.row -->
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
  
 