@extends('layouts.app')

@section('template_title')
Update Usuario
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Actualizar Usuario</span>
                </div>
                <div class="card-body">
                    {!!Form::model($user,['method'=>'PATCH','route'=>['usuario.update',$user->id]])
                    !!}
                    @csrf
                    <div class="box box-info padding-1">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group col-12">Cédula
                                        <label for="cedula"></label>
                                        <div class="form-group">
                                            <input type="text" name="cedula" value="{{  isset($user->cedula)?$user->cedula:'' }}" id="cedula" class="form-control" readonly>
                                        </div>
                                        @error('cedula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">Nombre
                                        <label for="nombre"></label>
                                        <div class="form-group">
                                            <input type="text" name="nombre" value="{{  isset($user->nombre)?$user->nombre:'' }}" id="nombre" class="form-control" required>
                                        </div>
                                        @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">Correo Electrónico
                                        <label for="email"></label>
                                        <div class="form-group">
                                            <input type="text" name="email" value="{{  isset($user->email)?$user->email:'' }}" id="email" class="form-control" required>
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="form-group">Rol
                                            <label for="" class="col-md-4 col-form-label text-md-end"></label>
                                            <select class="form-control" name="roles[]" id="rol">
                                                @foreach ($roles as $nombreRol => $nombreRolMostrable)
                                                <option value="{{ $nombreRol }}" {{ in_array($nombreRol, $selectedRoles) ? 'selected' : '' }}>{{ $nombreRolMostrable }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group col-12">Cambiar Contraseña
                                        <label for="password"></label>
                                        {!!Form::password('password',array('class'=>'form-control'))!!}
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">Confirmar Contraseña
                                        <label for="password-confirm"></label>
                                        {!!Form::password('confirm-password',array('class'=>'form-control'))!!}
                                    </div>
                                    <div class="form-group col-12">Estado
                                        <label for="estado" class="col-md-4 col-form-label text-md-end"></label>
                                        <select name="estado" class="form-control" id="estado" required>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-primary btn-lg active">Actualizar</button>
                            <a href="{{ route('usuario.index') }}" class="btn btn-primary btn-lg active" type="button">Cancelar</a>
                        </div>
                    </div>

                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</section>
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