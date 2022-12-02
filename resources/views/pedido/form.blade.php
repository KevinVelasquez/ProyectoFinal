
            <h4>Información Cliente</h4>
            <input type="hidden" name="total" id="total"/>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="control-label">Nombre</label>
                        <div class="col-sm-9">
                           <select class="form-control" name="id_cliente" id="id_cliente" onchange="info()">
                                        <option value="0">Selecciones</option>
                                         @forelse($cliente  as $clientes)
                                         <option value="{{$clientes->id}}">
                                        {{ $clientes->nombre}}
                                        </option>
                                         @empty <option>No existen</option>
                                        @endforelse
                            </select>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="control-label">Cédula</label>
                        <div class="col-sm-9">
                            <input type="number" name="cedula" id="cedula" class="form-control" readonly/>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label  class="control-label">Telefono</label>
                        <div class="col-sm-9">
                            <input  id="telefono" name="telefono" class="form-control" readonly/>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="control-label">Tipo Cliente</label>
                        <div class="col-sm-9">
                            <input id="tipo_persona" name="tipo_persona" class="form-control" readonly/>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group row">
                        <label class="control-label">Pais</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="pais" id="pais">
                                @forelse($paises  as $pais)
                                <option value="{{$pais->id}}">
                               {{ $pais->nombre}}
                               </option>
                                @empty <option>No existen</option>
                               @endforelse
                            </select>
                   {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group row">
                        <label class="control-label">Departamento</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="departamento" id="departamento">
                                @forelse($departamentos  as $departamento)
                                <option value="{{$departamento->id}}">
                               {{ $departamento->nombre}}
                               </option>
                                @empty <option>No existen</option>
                               @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group row">
                        <label class="control-label">Municipio</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="id_municipio" id="id_municipio">
                                @forelse($municipios  as $municipio)
                                <option value="{{$municipio->id}}">
                               {{ $municipio->nombre}}
                               </option>
                                @empty <option>No existen</option>
                               @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label">Dirección</label>
                        <div class="col-sm-9">
                            <input id="direccion" name="direccion" class="form-control" />
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
                            <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label  class="control-label"> Fecha de Entrega</label>
                        <div class="col-sm-7">
                            <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label  class="control-label">Metodo de Entrega</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="id_metodo_entrega" id="id_metodo_entrega">
                                @forelse($metodo_entrega  as $metodo_entregas)
                                <option value="{{$metodo_entregas->id}}">
                               {{ $metodo_entregas->nombre}}
                               </option>
                                @empty <option>No existen</option>
                               @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label  class="control-label"> Medio de Pago</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="medio_pago" id="medio_pago">
                                @forelse($medio_pago  as $medio_pagos)
                                <option value="{{$medio_pagos->id}}">
                               {{ $medio_pagos->nombre}}
                               </option>
                                @empty <option>No existen</option>
                               @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="control-label">Metodo de Pago</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="id_metodo_pago" id="id_metodo_pago">
                                @forelse($metodo_pago  as $metodo_pagos)
                                <option value="{{$metodo_pagos->id}}">
                               {{ $metodo_pagos->nombre}}
                               </option>
                                @empty <option>No existen</option>
                               @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label  class="control-label">Abono</label>
                        <div class="col-sm-9">
                            <input type="number" id="abono" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4>Información Productos</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label  class="control-label">Productos</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="producto" id="producto">
                                @forelse($producto  as $productos)
                                <option value="{{$productos->id}}">
                               {{ $productos->nombre}}
                               </option>
                                @empty <option>No existen</option>
                               @endforelse
                            </select> 
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group row">
                        <label  class="control-label">Cantidad</label>
                        <div class="col-sm-9">
                            <input type="number" id="cantidad" class="form-control" />

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="control-label">Precio</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="precio" />
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
                    <a type="button" class="mdi mdi-check-circle" style="color:green;font-size:400%;margin-left:40%" id="agregarprodu"></a>
                    <a type="button" class="mdi mdi-close-circle" style="color:red;font-size:400%;margin-left:8%"></a>
                </div>

                <div style="margin-top: 3%;">
                    <table id="resumen" class="table table-striped dt-responsive nowrap"
                        style="width:70%;margin-left:15%">
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
                            
                            <th id="totalpedido" name="totalpedido"></th>
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


<!-- scripts -->
<script>    
    $(document).ready(function(){

        $('#agregarprodu').click(function(){ 

            let producto_id = document.getElementById("producto").value;
            let producto = document.getElementById("producto");
            let selected = producto.options[producto.selectedIndex].text;
            let imagen = document.getElementById("figura").value;
            let cantidad = document.getElementById("cantidad").value;
            let precio = document.getElementById("precio").value;
            let descripcion = document.getElementById("descripcion").value;
            let figura = document.getElementById("figura").value;

            
            if (cantidad > 0 && precio > 0) {
            $("#datosresumen").append(`
                                
                                <tr id="tr-${producto_id}">
                                <td>${imagen}</td>
                                <input type="hidden" name="producto_id[]" value="${producto_id}"/>
                                <input type="hidden" name="cantidades[]" value="${cantidad}"/>
                                <input type="hidden" name="precios[]" value="${precio}"/>
                                <input type="hidden" name="imagenes[]" value="${figura}"/>
                                <input type="hidden" name="descripciones[]" value="${descripcion}"/>
                                <td>
                                ${selected}
                                </td>
                                <td>${cantidad}</td>
                                <td>${precio}</td>
                                <td>${parseInt(cantidad) * parseInt(precio)}</td>
                                <td>${descripcion}</td>
                                <td><a type="button" class="mdi mdi-close-circle" style="color:red;font-size:100%" id="eliminar" onclick="eliminarclick(${producto_id},
                                    ${parseInt(cantidad)*parseInt(precio)})"></a></td>     
                                </tr>

                                `);
            
            let preciototal = $("#totalpedido").val() || 0;
            $("#totalpedido").val(parseInt(preciototal) + (parseInt(cantidad) * parseInt(precio)));
            let todo = (parseInt(preciototal) + (parseInt(cantidad) * parseInt(precio)));
            document.getElementById('totalpedido').innerHTML = todo;
            document.getElementById('total').value = todo;
            }
            
            document.getElementById("cantidad").value ="";
            document.getElementById("precio").value ="";
            document.getElementById("figura").value ="";
            document.getElementById("descripcion").value ="";
        })


            
    })

    function eliminarclick(id,subtotal){
        $("#tr-" + id).remove();
        let preciototal = $("#totalpedido").val() || 0;
        $("#totalpedido").val(parseInt(preciototal) - subtotal);
        let nuevototal = (parseInt(preciototal) - subtotal);
        $("#totalpedido").val(nuevototal);
        document.getElementById('totalpedido').innerHTML = nuevototal;
    }

    function info(){
        let idseleccion = document.getElementById("id_cliente").value;
        if(idseleccion != 0){
            let usuarioseleccion = [];
            let usuario = <?php echo  $cliente  ?>;
                usuario.forEach(function(value, index) {
                usuarioseleccion[index] = value;

                if(usuarioseleccion[index].id==idseleccion){
                    $("#cedula").val(usuarioseleccion[index].cedula);
                    $("#telefono").val(usuarioseleccion[index].telefono);
                    if(usuarioseleccion[index].tipo_comercio==1){
                        $("#tipo_persona").val("Mayorista");
                    }
                    if(usuarioseleccion[index].tipo_comercio==2){
                        $("#tipo_persona").val("Minorista");
                    }
                    $("#direccion").val(usuarioseleccion[index].direccion);                 
                }
            });
        }
        
    }

</script>
{{-- 
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