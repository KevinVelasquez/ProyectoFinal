<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FERRUM</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{asset('assets/lib/bootstrap/dist/css/bootstrap.min.css')}" />
    <link rel="stylesheet" href="{asset('assets/css/style.css')}" />
    <link rel="shortcut icon" href="/../assets/img/favicon.png" />
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
    <style>
        body {
            font-family: sans-serif;
            background-image: url('/images/logoEnsayo.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #titulo {
            color: #79242f;
        }

        .recuperar {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #ddd;
        }

        .recuperar h1 {
            text-align: center;
            margin-top: 0;
        }

        .recuperar form {
            display: flex;
            flex-direction: column;
        }

        .recuperar label {
            margin-bottom: 10px;
        }

        .recuperar input[type="email"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .recuperar button[type="submit"] {
            padding: 10px;
            background-color: #81242E;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }


        .recuperar a[type="button"] {
            padding: 9px;
            font-size: small;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #boton-regresar {
            background-color: #565656;
        }


        .buton {
            padding-top: 5%;
        }
    </style>

</head>

<body>
    <div class="recuperar">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <h1>Recuperar Contraseña</h1>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="buton">
                <button type="submit" class="btn btn-primary ">
                    {{ __('Siguiente') }}
                </button>
                <a type="button" id="boton-regresar" style="font-size: 14px;" class="btn btn-primary " href="{{ route('login') }}">{{ __('Regresar') }}</a>
            </div>
        </form>
    </div>
</body>
<script src="/assets/lib/jquery/dist/jquery.min.js"></script>
<script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/site.js" asp-append-version="true"></script>

<script src="/assets/vendors/js/vendor.bundle.base.js"></script>

<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="/assets/js/off-canvas.js"></script>
<script src="/assets/js/hoverable-collapse.js"></script>
<script src="/assets/js/template.js"></script>
<script src="/assets/js/settings.js"></script>
<script src="/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="/assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="/assets/js/dashboard.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>