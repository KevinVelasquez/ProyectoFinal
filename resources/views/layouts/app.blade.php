<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FERRUM</title>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="/assets/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.9.55/css/materialdesignicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://pictogrammers.github.io/@mdi/font/5.4.55/">
    <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css' rel='stylesheet' /> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.0/dist/fullcalendar.min.css">

    
</head>

<body>
    <header>
        <div class="container-scroller">

            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="{{ route('calendario.index') }}"><img src="/../assets/img/LOGO LAS MARCAS TINTO-1.png" alt="logo" id="logo"></a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('calendario.index') }}"><img src="/../assets/img/LOGO LAS MARCAS TINTO-1.png" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
                        <span class="typcn typcn-th-menu"></span>
                    </button>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav navbar-nav-right">

                        <li class="nav-item d-none d-lg-flex  mr-2">
                            <a class="nav-link" href="https://youtube.com/playlist?list=PLEddzahFLbGjRnNeaOul20pJfkQoIS3b8" target="_blank" >
                                Ayuda
                            </a>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                                <span class="nav-profile-name"><?php echo e(Auth::user()->nombre); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ route('VistaPefil') }}">
                                    <i class="mdi mdi-face" style="color:#81242E"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#logoutModal">
                                    <i class="mdi mdi-login"  style="color:#81242E"></i>
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

            <div class="container-fluid page-body-wrapper" style="padding-left:0%;padding-right:0%">
                <nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('calendario.index') }}">
                                <i class="mdi mdi-calendar menu-icon"></i>
                                <span class="menu-title">Calendario</span>
                            </a>
                        </li>
                        @can('Configuración')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}">
                                <i class="mdi mdi-settings menu-icon"></i>
                                <span class="menu-title">Configuración</span>
                            </a>
                        </li>
                        @endcan
                        @can('Usuarios')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuario.index') }}">
                                <i class="mdi mdi-account-circle menu-icon"></i>
                                <span class="menu-title">Usuarios</span>
                            </a>
                        </li>
                        @endcan
                        @can('Menu-Compras')
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                                <i class="mdi mdi-wallet-travel menu-icon"></i>
                                <span class="menu-title">Compras</span>
                                <i class="typcn typcn-chevron-right menu-arrow"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                                <ul class="nav flex-column ">
                                    @can('Proveedores')
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('proveedor.index') }}">Proveedores</a></li>
                                    @endcan
                                    @can('Insumos')
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('insumos.index') }}">Insumos</a></li>
                                    @endcan
                                    @can('Ordenes-de-Compras')
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('compra.index') }}">Órdenes de
                                            Compra</a></li>
                                            @endcan
                                </ul>
                            </div>
                        </li>
                        @endcan
                        @can('Menu-Ventas')
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                                <i class="mdi mdi-trending-up menu-icon"></i>
                                <span class="menu-title">Ventas</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="form-elements">
                                <ul class="nav flex-column ">
                                @can('Clientes')
                                    <li class="nav-item"><a class="nav-link" href="{{ route('cliente.index') }}">Clientes</a></li>
                                    @endcan
                                    @can('Productos')
                                    <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Productos</a></li>
                                    @endcan
                                    @can('Pedidos')
                                    <li class="nav-item"><a class="nav-link" href="{{ route('pedidos.index') }}">Pedidos</a></li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                        @endcan
                        @can('Figuras')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('figuras.index') }}">
                                <i class="mdi mdi-panorama menu-icon"></i>
                                <span class="menu-title">Figuras Predefinidas</span>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('dashboard.index') }}">
                                <i class="mdi mdi-google-analytics menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <main class="py-4" style="width:100%;padding-left:18%;padding-right:0%">
                    @yield('content')
                </main>
            </div>
        </div>
        </div>
    </header>
    <footer class="footer" style="width:100%;padding-left:20%;padding-right:0%">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-center text-sm-left d-block d-sm-inline-block">Propiedad de FERRUM © 2020</span>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assets/lib/jquery/dist/jquery.min.js"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/site.js" asp-append-version="true"></script>
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/template.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <script src="/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/assets/vendors/chart.js/Chart.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    

    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js'></script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js'></script> -->

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.0/dist/fullcalendar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.0/dist/locale/es.js"></script>


    @yield("script")
</body>

</html>