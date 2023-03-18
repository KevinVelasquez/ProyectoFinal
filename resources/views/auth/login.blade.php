<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FERRUM</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="/assets/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">

</head>

<body style="background-image: url('images/fondoLogin.png');background-size: cover;">


    <div class="container-login">
        <div class="row">
            <div class="col-md-6 login-image">
                <img src="{{ asset('images/logoFerrum.png') }}" alt="Logo Ferrum">
            </div>
            <div class="col-md-6 login-form">
                <form method="POST" action="{{ route('login') }}" style="width: 100%;" enctype="multipart/form-data" class="form-sample needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="email" style="padding-left: 0%;" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                        <input id="email" type="email" style="width: 60%;" s class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" required>
                        @if(session('error'))
                        <div class="font-medium text-red-600" style="color: red;" role="alert">
                            {{ session('error')}}
                        </div>
                        @endif
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" style="padding-left: 0%;" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                        <input id="password" type="password" style="width: 60%;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group form-check" style="padding-left: 4%;margin-bottom: 0%;">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember" style="margin-left: 0%;">
                            {{ __('Recordarme') }}
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 1%;" >
                        {{ __('Ingresar') }}
                    </button>
                    <br>
                    <br>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" title="Recuperar Clave" style="color: black;">
                        {{ __('¿Olvidaste la contraseña?') }}
                    </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>

<script src="assets/js/jquery-3.3.1.min.js">

(function() {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>