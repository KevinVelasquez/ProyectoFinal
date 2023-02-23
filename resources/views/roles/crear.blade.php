@extends('layouts.app')

@section('content')
<div class="container" style="width:70%">
    <main role="main" class="pb-3">
        <h1>Crear Rol</h1>
        <hr />
        {!!Form::open(array('route'=>'roles.store','method'=>'POST'))!!}
        <div class="box box-info padding-1">
            <div class="box-body">
                <div class="form-group">
                    <label for="">
                        <label class="control-label">Nombre</label>
                        {!!Form::text('name',null,array('class'=>'form-control'))!!}
                        @error('name')
                        <div class="text-danger">{{ str_replace("name", "nombre", $errors->first('name')) }}</div>
                        @enderror
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
                            <td>{{Form::checkbox('permission[]', $value->id, false, array('class'=>'name'))}}</td>
                            <td>{{ ucwords(str_replace('-',' ', $value->name )) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @error('permission')
                <div class="text-danger">Debe seleccionar al menos un permiso</div>
                @enderror

                <br>
                <button type="submit" class="btn btn-primary ">Crear</button>
                <a class="btn btn-primary" href="{{ route('roles.index')}}" style="margin: 10px;  margin-top: 7%;">Cancelar</a>
            </div>
        </div>
        {!!Form::close()!!}
    </main>
</div>


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