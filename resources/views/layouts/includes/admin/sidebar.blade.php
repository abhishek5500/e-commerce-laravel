<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/dashboard') ? 'active':''}}" href="{{url('admin/dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title ">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/dashboard') ? 'active':''}}" href="{{url('admin/orders')}}">
              <i class="mdi mdi-sale menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/products') ||('admin/products/create') ? 'active':''}}" data-bs-toggle="collapse" href="#ui-basic"  >
              <i class="mdi mdi-plus-circle menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/products/create')}}">Add Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}">View Products</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="pages/charts/chartjs.html">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="pages/tables/basic-table.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/category') ? 'active':''}}" href="{{url('admin/category')}}">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Category</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/brands') ? 'active':''}}" href="{{url('admin/brands')}}">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Brands</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/colors') ? 'active':''}}" href="{{url('admin/colors')}}">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Colors</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/sliders') ? 'active':''}}" href="{{url('admin/sliders')}}">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Home Sliders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('admin/users')|| ('admin/users/create')? 'active':''}}" data-bs-toggle="collapse" href="#auth" >
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/users')}}"> Users</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/users/create')}}"> Add Users </a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>