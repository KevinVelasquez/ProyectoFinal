<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group col-12"> Cédula
                    <input id="cedula" type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>
                    @error('cedula')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-12"> Nombre
                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-12">Correo Electrónico
                    <label for="email" class="col-md-4 col-form-label text-md-end"></label>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="form-group col-12">
                    <div class="form-group">Rol
                        <label for="" class="col-md-4 col-form-label text-md-end"></label>
                        {!!Form::select('roles[]', $roles,[], array('class' => 'form-control'))!!}
                    </div>
                </div>
                <div class="form-group col-12">Contraseña
                    <label for="password" class="col-md-4 col-form-label text-md-end"></label>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-12">Confirmar Contraseña
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="confirm-password" required autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group col-12">

                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" href="{{ route('usuario.index')}}" class="btn btn-primary btn-lg active">Registrar</button>
        <button type="reset" value="Borrar" class="btn btn-primary btn-lg active">Limpiar</button>
        <a onclick="history.back()" class="btn btn-primary btn-lg active" type="button">Cancelar</a>
    </div>
</div>