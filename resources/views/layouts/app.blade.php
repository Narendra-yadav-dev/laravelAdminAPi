<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Strong Formula Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ config('app.url', 'basepath') }}assets/img/favicon.png" rel="icon">
  <link href="{{ config('app.url', 'basepath') }}assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ config('app.url', 'basepath') }}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ config('app.url', 'basepath') }}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ config('app.url', 'basepath') }}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ config('app.url', 'basepath') }}assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ config('app.url', 'basepath') }}assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ config('app.url', 'basepath') }}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ config('app.url', 'basepath') }}assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ config('app.url', 'basepath') }}assets/css/style.css" rel="stylesheet">
  
</head>

<body>
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="{{url('admin')}}" class="logo d-flex align-items-center">
    <img src="{{ config('app.url', 'basepath') }}assets/img/logo.png" alt="">
     
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<!-- <div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div> -->
<!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a><!-- End Messages Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="{{ config('app.url', 'basepath') }}assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Maria Hudson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="{{ config('app.url', 'basepath') }}assets/img/messages-2.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Anna Nelson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>6 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="{{ config('app.url', 'basepath') }}assets/img/messages-3.jpg" alt="" class="rounded-circle">
            <div>
              <h4>David Muldon</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>8 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="dropdown-footer">
          <a href="#">Show all messages</a>
        </li>

      </ul><!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        @if(auth()->guard('admin')->user()['image'] != '')
          <img src="{{ config('app.url', 'basepath') }}assets/img/users/{{ auth()->guard('admin')->user()['image']}}" alt="Profile" class="rounded-circle">
        @else
          <img src="{{ config('app.url', 'basepath') }}assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        @endif 
        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->guard('admin')->user()['name']}}</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{ auth()->guard('admin')->user()['name']}}</h6>
          <span>{{ auth()->guard('admin')->user()['job']}}</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{url('admin/userprofile')}}">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/logout') }}">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header>
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{url('admin')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
 

  <li class="nav-item {{ request()->is('admin/users') ? 'active' : '' }}">
    <a class="nav-link collapsed " href="{{ url('admin/users') }}">
      <i class="bi bi-person"></i>
      <span>Users</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('admin/category') }}">
      <i class="bi bi-person"></i>
      <span>Category</span>
    </a>
  </li> 
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('admin/products') }}">
      <i class="bi bi-circle"></i>
      <span>Products</span>
    </a>
  </li> 
  <li class="nav-item  ">
        <a class="nav-link  {{ (request()->is('admin/learn') || request()->is('admin/weeks')) ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Learns</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse {{ (request()->is('admin/learn') || request()->is('admin/weeks')) ? 'show' : '' }} {{ request()->is('admin/weeks') ? 'active' : '' }}" data-bs-parent="#sidebar-nav">
          <li class="{{ request()->is('admin/learn') ? 'active' : '' }}">
          <a href="{{ url('admin/learn') }}">
              <i class="bi bi-circle"></i><span>Learn</span>
            </a>
          </li>
          <li class="{{ request()->is('admin/weeks') ? 'active' : '' }}">
          <a href="{{ url('admin/weeks') }}">
              <i class="bi bi-circle"></i><span>Weeks</span>
            </a>
          </li>
        </ul>
      </li>
   
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ url('admin/pages') }}">
      <i class="bi bi-menu-button-wide"></i>
      <span>Pages</span>
    </a>
  </li>    
</ul>

</aside><!-- End Sidebar-->



@yield('content') 

<footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Kudosta</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Developed by <a href="https://kudosta.com">Kudosta</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ config('app.url', 'basepath') }}assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ config('app.url', 'basepath') }}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ config('app.url', 'basepath') }}assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ config('app.url', 'basepath') }}assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ config('app.url', 'basepath') }}assets/vendor/quill/quill.min.js"></script>
  <script src="{{ config('app.url', 'basepath') }}assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ config('app.url', 'basepath') }}assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ config('app.url', 'basepath') }}assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
    <script src="{{ config('app.url', 'basepath') }}assets/js/main.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'summary-ckeditor' );
    </script>
    <script src="{{ config('app.url', 'basepath') }}assets/js/jquery.min.js"></script>
    <script src="{{ config('app.url', 'basepath') }}assets/js/custom.js"></script>
</body>

</html>