 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo adminlte/dist/img/AdminLTELogo.png-->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('images/logo-removebg-preview.png')}}" alt="AdminJAJA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin JAJA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <?php
      $admin_name = Session::get('admin_name');
      $admin_id = Session::get('admin_id');
      $admin_img =  Session::get('admin_img');                 
      ?>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{$admin_img}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
         
          <a href="{{route('users.edit',['id'=>$admin_id])}}" class="d-block">{{$admin_name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh sách nhóm
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route('menus.index')}}" class="nav-link">
              <i class="nav-icon fa fa-map"></i>
              <p>
                Danh sách menu
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link">
              <i class="nav-icon fa fa-shopping-basket"></i>
              <p>
                Quản lý món ăn
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('slider.index')}}" class="nav-link">
              <i class="nav-icon fa fa-tablet"></i>
              <p>
                Quản lý slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
                Quản lý users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                Vai trò nhân viên (Roles)
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('customers.index')}}" class="nav-link">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Quản lý khách hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('bills.index')}}" class="nav-link">
              <i class="nav-icon fa fa-cart-arrow-down"></i>
              <p>
                Quản lý hóa đơn
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{route('coupons.index')}}" class="nav-link">
              <i class="nav-icon fa fa-gift"></i>
              <p>
                Quản lý mã giảm giá
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{URL::to('/delivery')}}" class="nav-link">
              <i class="nav-icon fa fa-motorcycle"></i>
              <p>
                Tính phí vận chuyển
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{route('promotions.index')}}" class="nav-link">
              <i class="nav-icon fa fa-percent"></i>
              <p>
                Quản lý khuyến mãi
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{route('feedbacks.index')}}" class="nav-link">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                Quản lý phản hồi
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route('permissions.create')}}" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Thêm các quyền User
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>