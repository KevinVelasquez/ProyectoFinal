<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group"> Cédula
            <input id="cedula" type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>
            @error('cedula')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group"> Nombre
            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

            @error('nombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">Correo Electrónico
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
        <div class="form-group">Rol
            <input id="rol" type="text" class="form-control @error('rol') is-invalid @enderror" name="rol" value="{{ old('rol') }}" required autocomplete="rol" autofocus>

            @error('rol')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">Contraseña
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
        <div class="form-group">Confirmar Contraseña
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>

            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="confirm-password" required autocomplete="new-password">
            </div>
        </div>
        <div class="form-group">
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
    <div class="col-md-12">
        <div class="col-md-12">
            <button type="submit" href="{{ route('usuario.index')}}" class="btn btn-primary float-left">Registrar</button>
        </div>
        <div class="col-md-12">
            <button onclick="history.back()" type="button" class="btn btn-primary float-right">Cancelar</button>
        </div>
    </div>
</div>