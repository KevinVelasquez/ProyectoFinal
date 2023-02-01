@extends('layouts.app')

@section('template_title')
{{ $user->name ?? 'Perfil' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('EditarPerfil')}}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row mb-3">
                    <div class="form-group mt-3">
                        <label for="nombre">Nombre de Usuario</label>
                        <input type="text" name="nombre" value="{{ Auth::user()->nombre }}" class="form-control @error('name') is-invalid @enderror" required>
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group mt-3">
                        <label for="cedula">Cédula</label>
                        <input type="number" name="cedula" value="{{ Auth::user()->cedula }}" class="form-control @error('cedula') is-invalid @enderror" required>
                        @error('cedula')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group mt-3">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group mt-3">
                        <label for="rol">Rol</label>
                        <input type="text" name="rol" value="{{ Auth::user()->rol }}" class="form-control @error('rol') is-invalid @enderror" required>
                        @error('rol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group mt-3">
                        <label for="estado">Estado</label>
                        <input type="number" name="estado" value="{{ Auth::user()->estado }}" class="form-control @error('estado') is-invalid @enderror" required>
                        @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group mt-3">
                        <label for="password_actual">Clave Actual</label>
                        <input type="password" name="password_actual" class="form-control @error('password_actual') is-invalid @enderror" required>
                        @error('password_actual')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group mt-3">
                        <label for="new_password ">Nueva Clave</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group mt-3">
                        <label for="confirm_password">Confirmar nueva Clave</label>
                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" required>
                        @error('confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row text-center mb-4 mt-5">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Actualizar información</button>
                        <a href="/home" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection