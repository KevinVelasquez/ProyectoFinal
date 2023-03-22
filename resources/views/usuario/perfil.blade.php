@extends('layouts.app')

@section('template_title')
{{ $user->name ?? 'Perfil' }}
@endsection

@section('content')
<div class="container mt-5">
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-6" id="tituloinicial2">
            <h3 style="margin-left: 16%;" class="mb-0 font-weight-bold">Perfil</h3>
        </div>
    </div>
</div>
    <form action="{{route('EditarPerfil')}}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="{{ Auth::user()->nombre }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cedula">Cédula</label>
                    <input type="number" name="cedula" value="{{ Auth::user()->cedula }}" class="form-control @error('cedula') is-invalid @enderror" readonly>
                    @error('cedula')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-sm">

            </div>
        </div>

        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12" id="tituloinicial2" style="margin-left: 35%;">
                    <h3 class="mb-0 font-weight-bold">Actualizar Contraseña</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">

            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="password_actual">Clave Actual</label>
                    <input type="password" name="password_actual" class="form-control @error('password_actual') is-invalid @enderror" >
                    @error('password_actual')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password ">Nueva Clave</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirmar Nueva Clave</label>
                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" >
                    @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="parbotones">
                    <button type="submit" class="btn btn-primary btn-lg active" id="botons">Actualizar</button>
                </div>
            </div>
            <div class="col-sm">

            </div>
        </div>
    </form>
</div>
<script>
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
@endsection