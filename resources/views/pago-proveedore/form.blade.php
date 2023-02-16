<div class="box box-info padding-1">
    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label for="nombre">Fecha</label>
                <div class="col-sm-9">
                    <input type="date" name="fecha" value="{{ $pagoProveedore->fecha }}" id="fecha" class="form-control">
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                <label for="abono">Abono</label>
                <div class="col-sm-9">
                    <input type="number" name="abono" value="{{ $pagoProveedore->abono }}" id="abono" class="form-control">
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group row">
                <label for="estado">Estado</label>
                <div class="col-sm-9">
                    <input type="number" name="estado" value="{{ $pagoProveedore->estado }}" id="estado" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row">
                <label for="id_medio_pagos">Medio de Pago</label>
                <div class="col-sm-7">
                    <select class="form-control" name="id_medio_pagos" id="id_medio_pagos">
                        <option value="0">Seleccione</option>
                        @forelse($medioPago as $medioPago)
                        <option value="{{$medioPago->id}}">
                            {{ $medioPago->nombre}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row">
                <label for="id_compra">Orden de compra</label>
                <div class="col-sm-7">
                    <select class="form-control" name="id_compra" id="id_compra">
                        <option value="0">Seleccione</option>
                        @forelse($compra as $compra)
                        <option value="{{$compra->id}}">
                            {{ $compra->n_orden}}
                        </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button> -->
</div>

    <div class="box-footer mt20">

        <button type="submit" class="btn btn-primary">Registrar Abono</button>
        <button type="reset" value="Borrar" class="btn btn-primary">Limpiar</button>
        <button onclick="history.back()" type="button" class="btn btn-primary">Cancelar</button>
    </div>
</div>