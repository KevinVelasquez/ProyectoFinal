            
            <h4>Información Cliente</h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="control-label">Nombre</label>
                        <div class="col-sm-9">
                            {{Form::text('id_cliente', $pedido->id_cliente, ['class' => 'form-control' . ($errors->has('id_cliente') ? ' is-invalid' : '')])}}
                            {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}

                        </div>
                    </div>
                </div>
                {{-- //         <div class="form-group">
                    //             {{ Form::label('id_cliente') }}
                    //             
                    //         </div> --}}
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="control-label">Cédula</label>
                        <div class="col-sm-9">
                            <input id="cedula"class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label  class="control-label">Telefono</label>
                        <div class="col-sm-9">
                            <input  id="telefono" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="control-label">Tipo Cliente</label>
                        <div class="col-sm-9">
                            <input id="tipo_persona"class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group row">
                        <label class="control-label">Pais</label>
                        <div class="col-sm-9">
                            <select id="pais"class="form-control" >

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="control-label">Departamento</label>
                        <div class="col-sm-8">
                            <select id="departamento"class="form-control">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group row">
                        <label class="control-label">Municipio</label>
                        <div class="col-sm-8">
                            <select id="municipio" class="form-control" >

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="control-label">Dirección</label>
                        <div class="col-sm-9">
                            <input id="direccion" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Información Pedido</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="control-label">Fecha de Registro</label>
                        <div class="col-sm-7">
                            <input id="fecha_registro" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label  class="control-label"> Fecha de Entrega</label>
                        <div class="col-sm-7">
                            <input  id="fecha_entrega" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label  class="control-label">Metodo de Entrega</label>
                        <div class="col-sm-7">
                            <select id="metodo_entrega" class="form-control" >

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label  class="control-label"> Medio de Pago</label>
                        <div class="col-sm-9">
                            <select id="medio_pago" class="form-control" >

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="control-label">Metodo de Pago</label>
                        <div class="col-sm-9">
                            <select id="metodo_pago" class="form-control" >

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label  class="control-label">Abono</label>
                        <div class="col-sm-9">
                            <input id="abono" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Información Pedido</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label  class="control-label">Productos</label>
                        <div class="col-sm-9">
                            <select  id="producto" class="form-control">

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group row">
                        <label  class="control-label">Cantidad</label>
                        <div class="col-sm-9">
                            <input id="cantidad" class="form-control" id="cantidad" />

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="control-label">Precio</label>
                        <div class="col-sm-9">
                            <input id="precio_unitario" class="form-control" id="precio" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="control-label">Diseño</label>
                    <div class="col-sm-9">
                    <input id="figura" type="file" class="form-control" />
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label">Descripción</label>
                        <div class="col-sm-9">
                            <input  id="descripcion" class="form-control"
                                style="height:5%" />
                        </div>
                    </div>
                </div>
            </div>
                <div style="margin-top: 2%;">
                    <a type="button" class="mdi mdi-check-circle" style="color:green;font-size:400%;margin-left:40%"
                        onclick="agregarprodu()"></a>
                    <a type="button" class="mdi mdi-close-circle" style="color:red;font-size:400%;margin-left:8%"></a>
                </div>

                <div style="margin-top: 3%;">
                    <table id="resumen" class="table table-striped dt-responsive nowrap"
                        style="width:50%;margin-left:20%">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio </th>
                                <th>Subtotal</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>TOTAL</th>
                            <th id="precio_total"></th>
                        </tfoot>
                        <tbody id=datosresumen>

                        </tbody>
                    </table>

                </div>

            </div>
            <div class="form-group" style="margin-top: 2%;margin-left: 39%;">
                <input type="submit" value="Crear" class="btn btn-primary" />
                <input type="button" value="Limpiar" class="btn btn-primary" />
                <input type="button" value="Cancelar" class="btn btn-primary" />

            </div>
        </form>


<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    function masinfo() {

        //let cedula = $("#cliente option:selected").attr();
        let cedula = document.getElementById("cliente").value;
        //$.ajax({
        //    type:"POST",
        //    url:"@Url.Action("cmdSelectedIndexChanged")",
        //    data:{idCliente:cedula}         
        //});

        $("#dato").val(cedula);

        console.log(cedula);
    }


    function agregarprodu() {
        let producto_id = $("#productos option:selected").val();
        let producto_text = $("#productos option:selected").text();
        let cantidad = $("#cantidad").val();
        let precio = $("#precio").val();
        let descripcion = $("#descripcion").val()

        if (cantidad > 0 && precio > 0) {
            $("#datosresumen").append(`
                                
                                <tr id="tr-${producto_id}">
                                <td>imagen</td>
                                <td>
                                <input type="hidden" name="producto_id[]" value="${producto_id}"/>
                                <input type="hidden" name="cantidades[]" value="${cantidad}"/>
                                ${producto_text}
                                </td>
                                <td>${cantidad}</td>
                                <td>${precio}</td>
                                <td ">${parseInt(cantidad) * parseInt(precio)}</td>
                                <td>${descripcion}</td>
                                <td><button type="button" class="mdi mdi-close-circle" style="color:red;font-size:5%" onclick="eliminar(${producto_id},${parseInt(cantidad) * parseInt(precio)})">X</button></td>
                                
                                </tr>

                                `);

            let preciototal = $("#precio_total").val() || 0;
            $("#precio_total").val(parseInt(preciototal) + (parseInt(cantidad) * parseInt(precio)));
            let todo = (parseInt(preciototal) + (parseInt(cantidad) * parseInt(precio)));
            document.getElementById('precio_total').innerHTML = todo;

        }

    }

    function eliminar(id, subtotal) {
        $("#tr-" + id).remove();
        let preciototal = $("#precio_total").val() || 0;
        console.log(preciototal);
        $("#precio_total").val(parseInt(preciototal) - subtotal);
        let nuevototal = (parseInt(preciototal) - subtotal);
        document.getElementById('precio_total').innerHTML = nuevototal;
    }




// <div class="box box-info padding-1">
//     <div class="box-body">
        

//         <div class="form-group">
//             {{ Form::label('id_municipio') }}
//             {{ Form::text('id_municipio', $pedido->id_municipio, ['class' => 'form-control' . ($errors->has('id_municipio') ? ' is-invalid' : ''), 'placeholder' => 'Id Municipio']) }}
//             {!! $errors->first('id_municipio', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('id_metodo_entrega') }}
//             {{ Form::text('id_metodo_entrega', $pedido->id_metodo_entrega, ['class' => 'form-control' . ($errors->has('id_metodo_entrega') ? ' is-invalid' : ''), 'placeholder' => 'Id Metodo Entrega']) }}
//             {!! $errors->first('id_metodo_entrega', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('id_medio_pago') }}
//             {{ Form::text('id_medio_pago', $pedido->id_medio_pago, ['class' => 'form-control' . ($errors->has('id_medio_pago') ? ' is-invalid' : ''), 'placeholder' => 'Id Medio Pago']) }}
//             {!! $errors->first('id_medio_pago', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('id_metodo_pago') }}
//             {{ Form::text('id_metodo_pago', $pedido->id_metodo_pago, ['class' => 'form-control' . ($errors->has('id_metodo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Id Metodo Pago']) }}
//             {!! $errors->first('id_metodo_pago', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('direccion') }}
//             {{ Form::text('direccion', $pedido->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
//             {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('fecha_registro') }}
//             {{ Form::text('fecha_registro', $pedido->fecha_registro, ['class' => 'form-control' . ($errors->has('fecha_registro') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Registro']) }}
//             {!! $errors->first('fecha_registro', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('fecha_entrega') }}
//             {{ Form::text('fecha_entrega', $pedido->fecha_entrega, ['class' => 'form-control' . ($errors->has('fecha_entrega') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Entrega']) }}
//             {!! $errors->first('fecha_entrega', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('estado') }}
//             {{ Form::text('estado', $pedido->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
//             {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('proceso') }}
//             {{ Form::text('proceso', $pedido->proceso, ['class' => 'form-control' . ($errors->has('proceso') ? ' is-invalid' : ''), 'placeholder' => 'Proceso']) }}
//             {!! $errors->first('proceso', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('abono') }}
//             {{ Form::text('abono', $pedido->abono, ['class' => 'form-control' . ($errors->has('abono') ? ' is-invalid' : ''), 'placeholder' => 'Abono']) }}
//             {!! $errors->first('abono', '<div class="invalid-feedback">:message</div>') !!}
//         </div>
//         <div class="form-group">
//             {{ Form::label('totalpedido') }}
//             {{ Form::text('totalpedido', $pedido->totalpedido, ['class' => 'form-control' . ($errors->has('totalpedido') ? ' is-invalid' : ''), 'placeholder' => 'Totalpedido']) }}
//             {!! $errors->first('totalpedido', '<div class="invalid-feedback">:message</div>') !!}
//         </div>

//     </div>
//     <div class="box-footer mt20">
//         <button type="submit" class="btn btn-primary">Submit</button>
//     </div>
// </div> --}}