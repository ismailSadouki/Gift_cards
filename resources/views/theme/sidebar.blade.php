<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <!-- <div class="sidebar-brand-icon">
            <img style="width:70%" src="{!! asset('logo.png') !!}" >
        </div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->is('admin') ? 'active' : ''}}">
        <a class="nav-link text-left" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{request()->is('admin/products*') ? 'active' : ''}}">
        <a class="nav-link text-left" href="{{route('products.index')}}">
            <i class="fas fa-gifts fa-2x text-gray-300"></i>

            <span>Products</span>
        </a>        
    </li>
    <li class="nav-item {{request()->is('admin/codes*') ? 'active' : ''}}">
        <a class="nav-link text-left" href="{{route('codes.index')}}">
            <i class="fas fa-code fa-2x text-gray-300"></i>

            <span>codes</span>
        </a>        
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->


    <li class="nav-item {{request()->is('admin/users*') ? 'active' : ''}}">
        <a class="nav-link text-left" href="{{route('users.index')}}">
            <i class="fas fa-users fa-2x text-gray-300"></i>

            <span>Users</span>
        </a>        
    </li>

   


   <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->







