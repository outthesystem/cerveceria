<nav id="sidebar">
  <!-- Sidebar Scroll Container -->
  <div id="sidebar-scroll">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
      <!-- Side Header -->
      <div class="content-header content-header-fullrow px-15">
        <!-- Mini Mode -->
        <div class="content-header-section sidebar-mini-visible-b">
          <!-- Logo -->
          <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                        <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
          </span>
          <!-- END Logo -->
        </div>
        <!-- END Mini Mode -->

        <!-- Normal Mode -->
        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
          <!-- Close Sidebar, Visible only on mobile screens -->
          <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
          <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
          <!-- END Close Sidebar -->

          <!-- Logo -->
          <div class="content-header-item">
            <a class="link-effect font-w700" href="{{url('/')}}">
                            <i class="si si-moustache text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">gentle</span><span class="font-size-xl text-primary">Men</span>
                        </a>
          </div>
          <!-- END Logo -->
        </div>
        <!-- END Normal Mode -->
      </div>
      <!-- END Side Header -->

      <!-- Side User -->
      <div class="content-side content-side-full content-side-user px-10 align-parent">
        <!-- Visible only in mini mode -->
        <div class="sidebar-mini-visible-b align-v animated fadeIn">
          <img class="img-avatar img-avatar32" src="{{asset('backend/img/avatars/avatar15.jpg')}}" alt="">
        </div>
        <!-- END Visible only in mini mode -->

        <!-- Visible only in normal mode -->
        <div class="sidebar-mini-hidden-b text-center">
          <a class="img-link" href="">
                        <img class="img-avatar" src="{{asset('backend/img/avatars/avatar15.jpg')}}" alt="">
                    </a>
          <ul class="list-inline mt-10">
            <li class="list-inline-item">
              <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="">
                              {{Auth::user()->name}}
                            </a>
            </li>
            <li class="list-inline-item">
              <a class="link-effect text-dual-primary-dark" href="">
                                <i class="si si-logout"></i>
                            </a>
            </li>
          </ul>
        </div>
        <!-- END Visible only in normal mode -->
      </div>
      <!-- END Side User -->

      <!-- Side Navigation -->
      <div class="content-side content-side-full">
        <ul class="nav-main">
          <li>
            <a class="{{ Request::segment(1) === 'dashboard' ? 'active' : null }}" href="{{url('dashboard')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Escritorio</span></a>
          </li>
          <li>
            <a class="{{ Request::segment(1) === 'client' ? 'active' : null }}" href="{{url('client/index')}}"><i class="si si-user"></i><span class="sidebar-mini-hide">Clientes</span></a>
          </li>
          <li class="
          {{ Request::segment(1) === 'product' ? 'open' : null }}
          ">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-book-open"></i><span class="sidebar-mini-hide">Productos</span></a>
            <ul>
              <li>
                <a class="
                {{ Request::segment(2) === 'categories' ? 'active' : null }}
                {{ Request::segment(2) === 'editcategory' ? 'active' : null }}
                " href="{{url('/product/categories')}}">Categorias</a>
              </li>
              <li>
                <a class="
                {{ Request::segment(2) === 'index' ? 'active' : null }}
                " href="{{url('/product/index')}}">Productos</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="{{ Request::segment(1) === 'invoiceb' ? 'active' : null }}" href="{{url('invoiceb/index')}}"><i class="si si-basket"></i><span class="sidebar-mini-hide">Facturas</span></a>
          </li>
          <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Administración del sitio
          </span></li>
          <li class="
          {{ Request::segment(1) === 'user' ? 'open' : null }}
          {{ Request::segment(1) === 'users' ? 'open' : null }}
          {{ Request::segment(1) === 'role' ? 'open' : null }}
          {{ Request::segment(1) === 'roles' ? 'open' : null }}
          {{ Request::segment(1) === 'permission' ? 'open' : null }}
          {{ Request::segment(1) === 'permissions' ? 'open' : null }}
          ">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-users"></i><span class="sidebar-mini-hide">Usuarios</span></a>
            <ul>
              <li>
                <a class="
                {{ Request::segment(1) === 'user' ? 'active' : null }}
                {{ Request::segment(1) === 'users' ? 'active' : null }}
                " href="{{url('/users')}}">Usuarios</a>
              </li>
              <li>
                <a class="
                {{ Request::segment(1) === 'permission' ? 'active' : null }}
                {{ Request::segment(1) === 'permissions' ? 'active' : null }}
                " href="{{url('/permissions')}}">Permisos</a>
              </li>
              <li>
                <a class="
                {{ Request::segment(1) === 'role' ? 'active' : null }}
                {{ Request::segment(1) === 'roles' ? 'active' : null }}
                " href="{{url('/roles')}}">Roles</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
  </div>
  <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->
