@extends('layouts.app')

@section('template_title')
Update Producto
@endsection

@section('content')
<div class="container" style="width:50%;margin-left: 25%;">
    <main role="main" class="pb-3">
        <h1>Actualizar Producto</h1>
        <hr />

        <form method="POST" action="{{ route('productos.update', $producto->id) }}" role="form"
            enctype="multipart/form-data" class="form-sample needs-validation" novalidate>
            {{ method_field('PATCH') }}
            @csrf

            <div class="form-group">
                <label class="control-label">Nombre</label>
                <div class="col-sm-9">
                    <input value="{{$producto->nombre}}" type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror"
                        required/>
                        @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>No se puede crear 2 productos con el mismo nombre</strong>
                        </span>
                        @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Productos</label>
                <image height="200px" src="{{ asset('/storage/images/productos/' . $producto->imagen) }}" />
                </td>
                <input type="file" name="imagen" id="imagen" class="form-control" style="margin-top: 2%;" />
            </div>
            <div>
            <label class="control-label">Estado</label>
                <select class="form-control" name="estado" id="editarEstado" required>
                    <option value="1">Disponible</option>
                    <option value="0">No disponible</option>
                </select>
            </div>


            <div class="box-footer mt20" >
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a class="btn btn-primary" href="{{ route('productos.index')}}" style="margin: 10px;  margin-top: 7%;">Cancelar</a>
            </div>


        </form>
    </main>
</div>

<script>
$(document).ready(function() {
    let producto =  {!! $productoestado->estado !!}
    $('#editarEstado').val(`${producto}`)
})
</script>

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