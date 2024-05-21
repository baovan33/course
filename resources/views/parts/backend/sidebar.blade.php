<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="margin-left: 0 !important;"> {{env('APP_NAME')}} </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @include('parts.backend.menu', [
        'title' => 'Category',
        'name'  => 'categories',
        'icon'  => 'fa-brands fa-algolia'
      ])

    @include('parts.backend.menu', [
        'title'   => 'Courses',
        'name'    => 'courses',
        'icon'    => 'fa-solid fa-list',
        'include' => ['admin/lessons/*',]
      ])
    @include('parts.backend.menu', [
       'title' => 'Teacher',
       'name'  => 'teacher',
       'icon'  => 'fa-solid fa-list'
     ])
    @include('parts.backend.menu', [
      'title' => 'User',
      'name'  => 'users',
      'icon'  => 'fa-solid fa-list'
    ])

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline" style="margin-top: 300px;">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


{{--{{asset('backend/')}}--}}
</ul>
