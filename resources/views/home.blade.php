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
        <center><h3 class="title_thongke">THỐNG KÊ TỔNG QUAN</h3></center>
          <hr/>
        <div class="row">
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$count_bills}}</h3>

                <p>Đơn hàng mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('bills.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 >{{$result}} %<sup ></sup></h3>
                
                <p>Đơn hàng hoàn thành</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{route('bills.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$count_customer}}</h3>

                <p>Khách hàng mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('customers.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$count_product}}</h3>

                <p>Số lượt xem món ăn</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{route('products.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

          <div class="row">
            <div class="card">
              <br>
                  <center><h3 class="title_thongke">THỐNG KÊ CHI TIẾT</h3></center>
                  
              <form autocomplete="off">
                @csrf
                <div class="row">
                  <div class="col-md-3" style="margin-left: 30px">
                    <p>Từ ngày: <input type="text" id="datepicker" class="form-control date_start"></p>
                  </div>
                  <div class="col-md-3">
                    <p>Đến ngày: <input type="text" id="datepicker2" class="form-control date_end"></p>
                  </div>
                  <div class="col-md-1">                  
                    <br/>
                    {{-- <center><p>Hoặc</p></div></center>
                  <div class="col-md-2">
                    <p>
                      Lọc theo
                      <select class="dashboard-filter form-control filter_bill">
                        <option >--Chọn--</option>
                        <option value="7ngay">7 ngày qua</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="thangnay">Tháng này</option>
                        <option value="365ngayqua">Năm vừa rồi</option>
                        
                      </select>
                      
                    </p>
                  </div> --}}
                  <div class="col-md-2">
                    <input type="button" class="btn btn-default " id="btn-filter" value="Lọc thống kê">
                  </div>
                </div>
              </form>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Ngày thống kê</th>
                      <th scope="col">Tổng doanh thu</th>
                      <th scope="col">Số đơn hàng thành công</th>
                    </tr>
                  </thead>
                  <tbody class="result">
                  </tbody>
                </table>
              
              
              
              </div>
             
              
            </div>
            <!-- /.card -->

            
          </div>
       
        {{-- <div class="col-md-12">
          <div class="card">
            <br>
                <center><h3 class="title_thongke">THỐNG KÊ TRUY CẬP</h3></center>
                <div class="col-md-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Đang online</th>
                        <th scope="col">Tổng tháng trước</th>
                        <th scope="col">Tổng tháng này</th>
                        <th scope="col">Tổng lượt truy cập</th>
                      </tr>
                    </thead>
                    <tbody >
                    </tbody>
                  </table>
                
                
                
                </div>
          
           
            
          </div>

          
        </div> --}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
  
 