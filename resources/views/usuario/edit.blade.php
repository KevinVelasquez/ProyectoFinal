@extends('layouts.app')

@section('template_title')
Update Usuario
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title"> Editar Usuario</span>
                </div>
                <div class="card-body">


                    {!!Form::model($user,['method'=>'PATCH','route'=>['usuario.update',$user->id]] )!!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                {!!Form::number('cedula',null,array('class'=>'form-control'))!!}
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                {!!Form::text('nombre',null,array('class'=>'form-control'))!!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                {!!Form::email('email',null,array('class'=>'form-control'))!!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                {!!Form::text('rol',null,array('class'=>'form-control'))!!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password"> Cambiar Contraseña </label>
                                {!!Form::password('password',array('class'=>'form-control'))!!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirm-password"> Confirmar contraseña </label>
                                {!!Form::password('confirm-password',array('class'=>'form-control'))!!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="estado" >Estado</label>
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

                        <div class="col-md-12">
                            <button onclick="history.back()" type="button" class="btn btn-primary float-right">Cancelar</button>
                            <button type="submit" class="btn btn-primary float-left">Editar y Guardar</button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

</section>
@endsection