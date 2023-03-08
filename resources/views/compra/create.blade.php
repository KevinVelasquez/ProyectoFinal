@extends('layouts.app')

@section('content')
<section class="content container-fluid">
    @includeif('partials.errors')
    <div class="card-header">
        <span class="card-title">Registrar Órden de Compra</span>
    </div>
    <form method="POST" action="{{ route('compra.store') }}" class="form-sample needs-validation" novalidate role="form" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            <div class="col-6" style="padding-top: 2%; padding-left: 2%;">
                <div class="card">
                    <div class="row card-body">
                        <div class="form-group col-6">
                            <label for="">Número Orden</label>
                            <input type="number" class="form-control" name="n_orden" required>
                            <div class="col-md-6">
                                @error('n_orden')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Fecha de Compra</label>
                            <input type="date" class="form-control" name="fecha_compra" required>
                            <div class="col-md-6">
                                @error('fecha_compra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="estado">Estado</label>
                            <select name="estado" class="form-control">
                                <option value="1">Activa</option>
                                <option value="2">Inactiva</option>
                            </select>
                            <div class="col-md-6">
                                @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="anulado">Anular</label>
                            <select name="anulado" class="form-control">
                                <option value="0">No Anulado</option>
                                <option value="1">Anulado</option>
                            </select>
                            <div class="col-md-6">
                                @error('anulado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Proveedor</label>
                            <select name="id_proveedor" class="form-control">
                                <option value="">Seleccione</option>
                                @foreach($id_proveedor as $id_proveedor)
                                <option value="{{ $id_proveedor->id }}">{{ $id_proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="id_metodo_pagos">Método de Pago</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="id_metodo_pagos" id="id_metodo_pagos">
                                    <option value="0">Seleccione</option>
                                    @forelse($metodo__pagos as $metodo_pagos)
                                    <option value="{{$metodo_pagos->id}}">
                                        {{ $metodo_pagos->nombre}}
                                    </option>
                                    @empty <option>No existen</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6" style="padding-right: 3%;">
                <div class="card">
                    <div class="card-head">
                        <h4 class="text-center">Info Insumos</h4>
                    </div>
                    <div class="row card-body">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Insumo</label>
                                <select name="id_insumo" id="id_insumo" class="form-control">
                                    @foreach($insumo as $insumo)
                                    <option value="{{ $insumo->id }}">{{ $insumo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Precio Unitario</label>
                                <input id="valor_unitario" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <button onclick="agregar_insumo()" type="button" class="btn btn-primary btn-lg active float-right">Agregar Insumo</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Sub Total</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tblInsumos">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-2" style="padding-left: 2%;">
                <label for="">Total Compra</label>
                <input type="number" class="form-control" name="total" id="total">
            </div>
            <div class="col-2" style="padding-left: 2%;">
                <label for="">Abono</label>
                <input type="number" class="form-control" name="abono" id="abono" required>
            </div>
            <div class="col-12" style="padding-left: 2%;">
                <button type="submit" href="{{ route('compra.index')}}" class="btn btn-primary btn-lg active">Guardar</button>
                <a onclick="history.back()" type="button" class="btn btn-primary btn-lg active" style="color:white">Cancelar</a>
            </div>
        </div>
    </form>
</section>
@endsection

@section("script")

<script>
    function colocar_precio() {

        let precio = $(e).attr("valor_unitario");

        $("valor_unitario").val(precio);

    }

    function agregar_insumo() {
        let id_insumo = $("#id_insumo option:selected").val();
        let insumo_text = $("#id_insumo option:selected").text();
        let cantidad = $("#cantidad").val();
        let valor_unitario = $("#valor_unitario").val();

        if (cantidad > 0 && valor_unitario > 0) {

            $("#tblInsumos").append(`
                <tr id="tr-${id_insumo}">
                    <td>
                    <input type="hidden" name="id_insumo[]" value="${id_insumo}"/>
                    <input type="hidden" name="cantidades[]" value="${cantidad}"/>
                    <input type="hidden" name="valor_unitario[]" value="${valor_unitario}"/>
                    ${insumo_text}
                    </td>
                    <td>${cantidad}</td>
                    <td>${valor_unitario}</td>
                    <td>${parseInt(cantidad) * parseInt(valor_unitario)}</td>
                    <td>
                    <button type="button" class="btn btn-danger" onclick="eliminar_insumo(${id_insumo}, ${parseInt(cantidad) * parseInt(valor_unitario)})">X</button>
                    </td>
                </tr>
                `);

            let total = $("#total").val() || 0;
            $("#total").val(parseInt(total) + parseInt(cantidad) * parseInt(valor_unitario));

        } else {
            alert("Se debe ingresar una cantidad o precio válido");
        }

    }

    function eliminar_insumo(id, subtotal) {
        $("#tr-" + id).remove();
        let total = $("#total").val() || 0;
        $("#total").val(parseInt(total) - subtotal);
    }

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