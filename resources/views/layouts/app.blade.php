<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FERRUM</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{asset('assets/lib/bootstrap/dist/css/bootstrap.min.css')}" />
  <link rel="stylesheet" href="{asset('assets/css/style.css')}" />
  <link rel="shortcut icon" href="{asset('assets/img/favicon.png')}" />
  <link rel="stylesheet" href="{asset('assets/vendors/typicons.font/font/typicons.css')}">
  <link rel="stylesheet" href="{asset('assets/vendors/css/vendor.bundle.base.css')}">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="/../assets/vendors/mdi/css/materialdesignicons.min.css">

</head>

<body>
  <header>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="/index.html"><img src="/../assets/img/LOGO LAS MARCAS TINTO-1.png" alt="logo" id="logo"></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/../assets/img/LOGO LAS MARCAS TINTO-1.png" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item d-none d-lg-flex  mr-2">
              <a class="nav-link" href="#">
                Ayuda
              </a>
            </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <span class="nav-profile-name"><?php echo e(Auth::user()->nombre); ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-face text-primary"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            <li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="typcn typcn-th-menu"></span>
            </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-calendar menu-icon"></i>
                <span class="menu-title">Calendario</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Configuración</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-account-circle menu-icon"></i>
                <span class="menu-title">Usuarios</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-wallet-travel menu-icon"></i>
                <span class="menu-title">Compras</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column ">
                  <li class="nav-item"> <a class="nav-link" href="#">Proveedores</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Insumos</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('compra.index')}}">Ordenes de
                      Compra</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="mdi mdi-trending-up menu-icon"></i>
                <span class="menu-title">Ventas</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column ">
                  <li class="nav-item"><a class="nav-link" href="#">Clientes</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Productos</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Pedidos</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-panorama menu-icon"></i>
                <span class="menu-title">Figuras Predefinidas</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="icons">
                <i class="mdi mdi-google-analytics menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- CSRF Token -->
          <meta name="csrf-token" content="{{ csrf_token() }}">

          <title>{{ config('app.name', 'Laravel') }}</title>

          <!-- Fonts -->
          <link rel="dns-prefetch" href="//fonts.gstatic.com">
          <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

          <!-- Scripts -->
          @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        </head>
      </div>
  </header>
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-center text-sm-left d-block d-sm-inline-block">Propiedad de FERRUM ©<a href="https://www.bootstrapdash.com/"></a> 2020</span>
    </div>
  </footer>

  <script src="/../assets/lib/jquery/dist/jquery.min.js"></script>
  <script src="/../assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/../assets/js/site.js" asp-append-version="true"></script>

  <script src="/../assets/vendors/js/vendor.bundle.base.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/../assets/js/off-canvas.js"></script>
  <script src="/../assets/js/hoverable-collapse.js"></script>
  <script src="/../assets/js/template.js"></script>
  <script src="/../assets/js/settings.js"></script>
  <script src="/../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="/../assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="/../assets/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="/../assets/js/dashboard.js"></script>
  =======
  <script src="/assets/lib/jquery/dist/jquery.min.js"></script>
  <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/site.js" asp-append-version="true"></script>

  <script src="/assets/vendors/js/vendor.bundle.base.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/../assets/js/off-canvas.js"></script>
  <script src="/../assets/js/hoverable-collapse.js"></script>
  <script src="/../assets/js/template.js"></script>
  <script src="/../assets/js/settings.js"></script>
  <script src="/../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="/../assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="/../assets/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="/../assets/js/dashboard.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</body>

</html>