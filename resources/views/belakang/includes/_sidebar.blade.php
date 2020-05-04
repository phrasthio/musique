<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('gambars/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <i class="fa fa-circle text-success"></i> {{ Auth::user()->role }}</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU SETTING</li>
        <li>
          <a href="/admin/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/admin/inorder">
            <i class="fa fa-calendar"></i> <span>Order</span>
          </a>
        </li>
        <li>
          <a href="/admin/kategori">
            <i class="fa fa-pencil"></i> <span>Category</span>
          </a>
        </li>
        <li>
          <a href="/admin/product">
            <i class="fa fa-laptop"></i> <span>Products</span>
          </a>
        </li>

        <li>
          <a href="/admin/customer">
            <i class="fa fa-user"></i> <span>Customers</span>
          </a>
        </li>

        @if(auth()->user()->role == "pemilik")
        <li>
          <a href="/admin/user">
            <i class="fa fa-user"></i> <span>Admin</span>
          </a>
        </li>
        @endif

        <li>
          <a href="#">
            <i class="fa fa-envelope"></i> <span>...</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-folder"></i> <span>...</span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-share"></i> <span>...</span>
          </a>
        </li>

        <li>
          <a href="#"> 
            <i class="fa fa-book"></i> <span>...</span>
          </a>
        </li>

        <li class="header">LABELS</li>

        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>BAHAYA</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>HATI-HATI</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>INFORMASI</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>