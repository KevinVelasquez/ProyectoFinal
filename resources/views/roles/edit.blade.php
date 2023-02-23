@extends('layouts.app')

@section('content')
<div class="container" style="width:70%">
    <main role="main" class="pb-3">
        <h1>Actualizar Rol</h1>
        <hr />

        {!!Form::model($role,['method'=>'PATCH','route'=>['roles.update',$role->id]])!!}
        <div class="box box-info padding-1">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="">
                            <label class="control-label">Nombre</label>
                            {!!Form::text('name',null,array('class'=>'form-control'))!!}
                            @error('name')
                            <div class="text-danger">{{ str_replace("name", "nombre", $errors->first('name')) }}</div>
                            @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="">
                            <label class="control-label">Estado</label>
                            <select class="form-control" name="estado" id="editarEstado" style="width:170%" required>
                                <option value="1">Disponible</option>
                                <option value="0">No disponible</option>
                            </select>
                            @error('estado')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <input type="checkbox" id="select-all" /> Seleccionar todos
                <hr>

                <table id="roles" class="table table-striped dt-responsive nowrap table" style="width:100%">
                    <thead>
                        <tr>
                            <th class="col-md-1 "><label>Seleccione</label></th>
                            <th> <label for="">Permisos para este Rol:</label></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permission as $value)
                        <tr>
                            <td>
                                <label>
                                    {{Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions))}}
                                </label>
                            </td>
                            <td>{{ ucwords(str_replace('-',' ', $value->name )) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @error('permission')
                <div class="text-danger">Debe seleccionar al menos un permiso</div>
                @enderror

                <br>
                <button type="submit" class="btn btn-primary ">Actualizar</button>
                <a class="btn btn-primary" href="{{ route('roles.index')}}" style="margin: 10px;  margin-top: 6%;">Cancelar</a>
            </div>
        </div>
        {!!Form::close()!!}
    </main>
</div>


<script>
$(document).ready(function() {
    let roles = {
        !!$role - > estado!!
    }
    $('#editarEstado').val(`${roles}`)
})
</script>

<script>
$(document).ready(function() {
    $('#roles').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });

    $('#select-all').click(function() {
        $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });
});
</script>
@endsection