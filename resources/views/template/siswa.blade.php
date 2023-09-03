<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keyword" content="">
  <meta name="author" content="Yosua">

  <title>
    <?= $title; ?>
  </title>

  <!-- Custom fonts for this template -->
  <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{asset('template/css/pembayaran.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
</head>

<body id="page-top">
<!-- Overlay untuk menutup sidebar saat mengklik area di luar sidebar -->
<div id="sidebar-overlay"></div>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-cloud"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>
  
      <hr class="sidebar-divider my-0">
  
      <li class="nav-item @if ($active == '') active @endif">
          <a href="{{ url('home') }}" class="nav-link">
              <i class="bx bx-home"></i>
              <span>Home</span>
          </a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item @if ($active == '') active @endif">
          <a href="{{ url('spp') }}" class="nav-link">
              <i class="fas fa-money-bill-wave"></i>
              <span>Data Spp</span>
          </a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item @if ($active == '') active @endif">
          <a href="{{ url('siswa') }}" class="nav-link">
              <i class="fas fa-user"></i>
              <span>Siswa</span>
          </a>
      </li>
      <hr class="sidebar-divider my-0">
      <li class="nav-item @if ($active == '') active @endif">
          <a href="{{ url('settings') }}" class="nav-link">
              <i class="bx bx-cog"></i>
              <span>Settings</span>
          </a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
  
      <!-- Logout -->
      <li class="nav-item mt-auto">
          <a href="{{ url('logout') }}" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              Logout
          </a>
      </li>
  </ul>
  
  

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          {{-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> --}}

          <!-- Topbar Navbar -->
          <button class="icon-button"><i class="fas fa-bars"></i></button>
          <h1 class="h3 mb-2 m-4 text-gray"><strong>Data Pembayaran</strong></h1>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="template/img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                   aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{url('logout')}}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('konten')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  @yield('modals')
  <!-- Bootstrap core JavaScript -->
  <script src="template/vendor/jquery/jquery.min.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="template/js/demo/datatables-demo.js"></script>
  <script src="template/js/sweetalert2@11.js"></script>

  {{-- Custom Js --}}
  <script src="template/js/pembayaran.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("accordionSidebar");
  const contentWrapper = document.getElementById("content-wrapper");
  const sidebarToggle = document.querySelector(".icon-button");
  const overlay = document.getElementById("sidebar-overlay");

  sidebarToggle.addEventListener("click", function () {
    sidebar.classList.toggle("active");
    contentWrapper.classList.toggle("active");
    overlay.classList.toggle("active");
  });

  overlay.addEventListener("click", function () {
    sidebar.classList.remove("active");
    contentWrapper.classList.remove("active");
    overlay.classList.remove("active");
  });
});



  </script>

  @yield('js')
</body>

</html>
