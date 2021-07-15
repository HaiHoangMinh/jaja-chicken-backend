<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title') 
  <!-- Tìm trường title để add -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <link rel="shortcut icon" href="https://scontent.fpnh22-3.fna.fbcdn.net/v/t1.6435-9/161717683_210969530832330_5178469175515308511_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=cMOcqUWoHtwAX-zuxhR&_nc_ht=scontent.fpnh22-3.fna&oh=b5d0f8422e63b9d7bb0edc7139720dbd&oe=60E70F7C" />
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('partials.header')

 @include('partials.siderbar')

@yield('content')
 {{-- Tìm trường content để add vào --}}



@include('partials/footer')
</div>

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script>
    $(document).ready(function(){
      $('.add_delivery').click(function(){
        var city = $('.city').val();
        var province = $('.province').val();
        var wards = $('.wards').val();
        var _token =$('input[name="_token"]').val();
        var fee_ship = $('.fee_ship').val();
        $.ajax({
          url: '{{url('/insert-delivery')}}',
          method: 'POST',
          data: {wards:wards,province:province,fee_ship:fee_ship,city:city,_token:_token},
          success:function(data){
            alert("thêm thành công");
          }
        });
        
      })
      $('.choose').change(function(){
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token =$('input[name="_token"]').val();
        var result = "";
        if (action == 'city') {
          result = 'province';
        } else {
          result = 'wards';
        }
        $.ajax({
          url: '{{url('/select-delivery')}}',
          method: 'POST',
          data: {action:action,ma_id:ma_id,_token:_token},
          success:function(data){
            $('#'+result).html(data);
          }
        });
      })
    });
</script>
@yield('js')
</body>
</html>
