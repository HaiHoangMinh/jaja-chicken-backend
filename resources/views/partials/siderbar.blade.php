 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo adminlte/dist/img/AdminLTELogo.png-->
    <a href="/" class="brand-link">
      <img src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.6435-9/161717683_210969530832330_5178469175515308511_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=q1nZUG-MJSMAX8gsQ3p&_nc_ht=scontent.fhan2-3.fna&oh=4efa12ee6421f59bff08a1b69228444a&oe=60E909BC" alt="AdminJAJA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin JAJA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) {{asset('adminlte/dist/img/user2-160x160.jpg')}}-->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t1.18169-9/537693_122897071205480_1232924036_n.jpg?_nc_cat=110&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=NfJvKuMpZocAX8zM-gV&_nc_ht=scontent.fhan2-4.fna&oh=eea39043bc6c67ad927e5ae74bcb9f58&oe=60E64072" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
         
          <a href="{{route('users.index')}}" class="d-block"></a>
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
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                Vai trò nhân viên (Roles)
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