@extends('layouts.app')

@section('template_title')
Nueva Compra
@endsection

@section('content')
@includeif('partials.errors')

@if(Session::has('success'))
{{Session::get('success') }}

@endif

<div class="container" style="width:90%;margin-left: 4%;">
    <main role="main" class="pb-3">
        <h1>Registrar Compra</h1>
        <hr />
        <form method="POST" action="{{ route('compra.store') }}" enctype="multipart/form-data" class="form-sample needs-validation" novalidate>
            @csrf
            <div class="col-12">

                <div class="row card-body">
                    <div class="form-group col-6">
                        <label for="">Número de Orden</label>
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
                        <?php
                        $fechamax = date('Y-m-d');
                        ?>
                        <input type="date" class="form-control" max="<?= $fechamax; ?>" name="fecha_compra" required>
                        <div class="col-md-6">
                            @error('fecha_compra')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Proveedor</label>
                        <select name="id_proveedor" class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach($id_proveedor as $id_proveedor)
                            <option value="{{ $id_proveedor->id }}">{{ $id_proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="id_metodo_pagos">Método de Pago</label>

                        <select class="form-control" name="id_metodo_pagos" id="id_metodo_pagos" required>
                            <option value="">Seleccione</option>
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

            <div class="col-12" style="padding-right: 6%; padding-left: 6%;">

                <div class="card-head" style="padding-bottom: 3%;">
                    <h3 class="text-center">Información de Insumos</h3>
                </div>
                <div class="row card-body">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Insumo</label>
                            <select name="id_insumo" id="id_insumo" class="form-control">
                                @foreach($insumo as $insumo)
                                <option value="{{ $insumo->id }}">{{ $insumo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Precio Unitario</label>
                            <input id="valor_unitario" type="text" class="form-control" required>
                        </div>
                    </div>
                    <a type="button" class="mdi mdi-plus-circle" style="color:green;font-size:400%;float: left;" onclick="agregar_insumo()"></a>
                </div>
                <div class="table-insumos" style="padding-left: 2%;padding-right: 2%;">
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

            <div class="col-12" style="padding-top: 2%; padding-left: 2%;">
                <div class="row card-body" style="padding-left: 23%;padding-top: 6%;">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Total Compra</label>
                            <input type="number" class="form-control" name="total" id="total" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Abono</label>
                            <input type="number" class="form-control" name="abono" id="abono" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12" style="padding-bottom: 5%;">
                <div class="col-6" style="padding-left:24%;">
                    <button type="submit" class="btn btn-primary btn-lg active">Guardar</button>
                    <a href="{{ route('compra.index') }}" id="boton-regresar" class="btn btn-primary btn-lg active" type="button">Cancelar</a>
                </div>
            </div>

            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
        </form>
    </main>
</div>

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


        let filas = document.getElementById('tblInsumos').rows;
        let insumoEncontrado = false;

        if (cantidad > 0 && valor_unitario > 0) {

            for (let i = 0; i < filas.length; i++) {
                let idInsumoTabla = filas[i].cells[0].innerText;
                if (id_insumo == idInsumoTabla) {
                    alert('Este insumo ya está en la lista.');
                    insumoEncontrado = true;
                    break;
                }
            }

            if (!insumoEncontrado) {
                $("#tblInsumos").append(`
                    <tr id="tr-${id_insumo}">
                        <td style="display:none">${id_insumo}</td>
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
                        <a type="button" class="mdi mdi-close-circle" style="color:red;font-size:30px" onclick="eliminar_insumo(${id_insumo}, ${parseInt(cantidad) * parseInt(valor_unitario)})"></a>
                        </td>
                    </tr>
                    `);
                let total = $("#total").val() || 0;
                $("#total").val(parseInt(total) + parseInt(cantidad) * parseInt(valor_unitario));
            }
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