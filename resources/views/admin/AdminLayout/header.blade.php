<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>@yield('title')</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- [Favicon] icon -->
  <link rel="icon" href="{{ asset('dist/assets/images/image.png') }}" type="image/x-icon"> <!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{ asset('dist/assets/fonts/tabler-icons.min.css') }}" >
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{ asset('dist/assets/fonts/feather.css') }}" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{ asset('dist/assets/fonts/fontawesome.css') }}" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{ asset('dist/assets/fonts/material.css') }}" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}" id="main-style-link" >
<link rel="stylesheet" href="{{ asset('dist/assets/css/style-preset.css') }}" >
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="/users" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="dist/assets/images/image.png" class="img-fluid logo-lg" alt="logo" style="width: 100px; height: auto; margin-top: 10px;">

      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        {{-- <li class="pc-item pc-caption">
          <label>UI Components</label>
          <i class="ti ti-icon"></i>
        </li> --}}
        <li class="pc-item">
          <a href="/users" class="pc-link">
            <span class="pc-micon"><i class="ti ti-users"></i></span>
            <span class="pc-mtext">Users</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/requests" class="pc-link">
            <span class="pc-micon"><i class="ti ti-git-pull-request"></i></span>
            <span class="pc-mtext">Requests</span>
          </a>  
        </li>
        <li class="pc-item">
          <a href="/skill" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bulb"></i></span>
            <span class="pc-mtext">Skills</span>
          </a>  
        </li>
        <li class="pc-item">
          <a href="/skill-assign" class="pc-link">
            <span class="pc-micon"><i class="ti ti-layers-linked"></i></span>
            <span class="pc-mtext">Skills-Assigned</span>
          </a>  
        </li>
        <li class="pc-item">
          <a href="/state" class="pc-link">
            <span class="pc-micon"><i class="ti ti-building-community"></i></span>
            <span class="pc-mtext">States</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/city" class="pc-link">
            <span class="pc-micon"><i class="ti ti-building-skyscraper"></i></span>
            <span class="pc-mtext">Cities</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/feedbacks" class="pc-link">
            <span class="pc-micon"><i class="ti ti-message-report"></i></span>
            <span class="pc-mtext">Feedbacks</span>
          </a>
        </li>

        {{-- <li class="pc-item">
          <a href="/" class="pc-link">
            <span class="pc-micon"><i class="ti ti-lock"></i></span>
            <span class="pc-mtext">Login</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="/register" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
            <span class="pc-mtext">Register</span>
          </a>
        </li> --}}
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <li class="pc-item">
          <a href="/logout" class="pc-link">
            <span class="pc-micon"><i class="ti ti-logout"></i></span>
            <span class="pc-mtext">logout</span>
          </a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <!-- ======= Menu collapse Icon ===== -->
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item d-inline-flex d-md-none">
      <a
        class="pc-head-link dropdown-toggle arrow-none m-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ti ti-search"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3">
          <div class="form-group mb-0 d-flex align-items-center">
            <i data-feather="search"></i>
            <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
          </div>
        </form>
      </div>
    </li>
    {{-- <li class="pc-h-item d-none d-md-inline-flex">
      <form class="header-search">
        <i data-feather="search" class="icon-search"></i>
        <input type="search" class="form-control" placeholder="Search here. . .">
      </form>
    </li> --}}
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
    <li class="dropdown pc-h-item">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ti ti-mail"></i>
      </a>
      
    </li>
    <li class="dropdown pc-h-item header-user-profile">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        data-bs-auto-close="outside"
        aria-expanded="false"
      >
        <img src="dist/assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
        <span> 
        @if(session()->has('fullname'))
          {{ session()->get('fullname') }} 
          {{-- or session('fullname') --}}
        @endif
        </span>
      </a>
     
    </li>
  </ul>
</div>
</div>
 </div>
</header>
<!-- [ Header ] end -->