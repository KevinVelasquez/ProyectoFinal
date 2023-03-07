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
                    <span class="card-title"> Editar Usuario</span>
                </div>
                <div class="card-body">

                    {!!Form::model($user,['method'=>'PATCH','route'=>['usuario.update',$user->id]] )!!}
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="col-md-12">
                                <div class="form-group">Cédula
                                    <label for="cedula"></label>
                                    {!!Form::number('cedula',null,array('class'=>'form-control'))!!}
                                    @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">Nombre
                                    <label for="nombre"></label>
                                    {!!Form::text('nombre',null,array('class'=>'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">Correo Electrónico
                                    <label for="email"></label>
                                    {!!Form::email('email',null,array('class'=>'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">Rol
                                    <label for="rol"></label>
                                    {!!Form::text('rol',null,array('class'=>'form-control'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="col-md-12">
                                <div class="form-group">Cambiar Contraseña
                                    <label for="password"> </label>
                                    {!!Form::password('password',array('class'=>'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">Confirmar contraseña
                                    <label for="confirm-password"> </label>
                                    {!!Form::password('confirm-password',array('class'=>'form-control'))!!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="estado">Estado</label>
                                <select name="estado" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                                <div class="col-md-6">
                                    @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-primary btn-lg active">Editar y Guardar</button>
                            <button onclick="history.back()" type="button" class="btn btn-primary btn-lg active">Cancelar</button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

</section>
@endsection