<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Visualisasi Data</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=" {{ asset('tampilan/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('tampilan/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('tampilan/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


  <style > 
  /* atas */
    .sidebar-dark-primary {
      background-color: green;
    }
    /* tulisan sidebar */
    .nav-link {
      color: white !important;
    }
    .navbar-custom {
      background-color: green;
    }
    .navbar-custom .nav-link {
      color: white;
    }
    /* samping sidebar */
    .main-sidebar {
      background-color: green !important;
    }
   .brand-link {
    background-color: green !important;
   }
   
</style>
</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-custom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a> -->
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: green;">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
          <img src="{{ asset('tampilan/dist/img/logo_KKR.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">DISBUNNAK</span>
        </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('tampilan/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home              
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/olahdata" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kelola Data              
              </p>
            </a>
          </li>

          <li class="nav-item">
              <a href="{{ route('notification.notifikasi') }}" class="nav-link">
                  <i class="nav-icon fas fa-bell"></i>
                  <p>Notifikasi</p>
              </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
              <p>
                Hak Akses            
              </p>
            </a>
          </li>

          <li class="nav-item">
              <a href="{{ route('profile.edit') }}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                      Edit Profile            
                  </p>
              </a>
          </li>

          <li class="nav-item">
            <a href="/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt logout-icon fa-flip-horizontal"></i> 
              <p>
                Logout            
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
</div>
<!-- ./dropdown -->
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('tampilan/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('tampilan/plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- overlayScrollbars -->
<script src="{{ asset('tampilan/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('tampilan/dist/js/adminlte.js') }} "></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('tampilan/plugins/jquery-mousewheel/jquery.mousewheel.js') }} "></script>
<script src="{{ asset('tampilan/plugins/raphael/raphael.min.js') }} "></script>
<script src="{{ asset('tampilan/plugins/jquery-mapael/jquery.mapael.min.js') }} "></script>
<script src="{{ asset('tampilan/plugins/jquery-mapael/maps/usa_states.min.js') }} "></script>
<!-- ChartJS -->
<script src="{{ asset('tampilan/plugins/chart.js/Chart.min.js') }} "></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('tampilan/dist/js/pages/dashboard2.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Retrieve the sidebar state from local storage
        const sidebarState = localStorage.getItem('sidebarState');
        
        // Set the sidebar state based on the value in local storage
        if (sidebarState === 'collapsed') {
            document.body.classList.add('sidebar-collapse');
        } else {
            document.body.classList.remove('sidebar-collapse');
        }

        // Add event listener to the sidebar toggle button
        document.querySelector('[data-widget="pushmenu"]').addEventListener('click', function () {
            // Check the current state of the sidebar and save the opposite state
            if (document.body.classList.contains('sidebar-collapse')) {
                localStorage.setItem('sidebarState', 'expanded');
            } else {
                localStorage.setItem('sidebarState', 'collapsed');
            }
        });
    });
</script>

</body>
</html>
