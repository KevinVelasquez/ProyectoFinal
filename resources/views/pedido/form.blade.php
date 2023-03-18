<h4>Información Cliente</h4>

<div class="row">
    <div class="col-md-3">
        <div class="form-group row">
            <label class="control-label">Nombre</label>
            <div class="col-sm-9">
                <select class="form-control" name="id_cliente" id="id_cliente" onchange="info()" required>
                    <option selected disabled value="">Seleccione</option>
                    @forelse($cliente  as $clientes)
                        <option value="{{ $clientes->id }}">
                            {{ $clientes->nombre }}
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
                <input type="number" name="cedula" id="cedula" class="form-control" readonly />
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group row">
            <label class="control-label">Teléfono</label>
            <div class="col-sm-9">
                <input id="telefono" name="telefono" class="form-control" readonly />
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group row">
            <label class="control-label">Tipo Cliente</label>
            <div class="col-sm-9">
                <input id="tipo_persona" name="tipo_persona" class="form-control" readonly />
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group row">
            <label class="control-label">País</label>
            <div class="col-sm-9">
                <select class="form-control" name="pais" id="pais" onchange="filtrarDepartamentos()" required>
                    <option selected disabled value="">Seleccione</option>
                    @forelse($paises  as $pais)
                        <option value="{{ $pais->id }}">
                            {{ $pais->nombre }}
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
                <select class="form-control" name="departamento" id="departamento" onchange="filtrarMunicipios()" required>
                    <option selected disabled value="">Seleccione</option>
                    @forelse($departamentos  as $departamento)
                        <option value="{{ $departamento->id }}">
                            {{ $departamento->nombre }}
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
                <select class="form-control" name="id_municipio" id="municipio" required>
                    <option selected disabled value="">Seleccione</option>
                    @forelse($municipios  as $municipio)
                        <option value="{{ $municipio->id }}">
                            {{ $municipio->nombre }}
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
                <input id="direccion" name="direccion" class="form-control" required />
            </div>
        </div>
    </div>
</div>
<hr>
<h4>Información Pedido</h4>
<div class="row">
    <div class="col-md-4">
        <div class="form-group row">
            <label class="control-label">Fecha de Entrega</label>
            <div class="col-sm-7">
            <?php
            $fechamin = date('Y-m-d');
            ?>
                <input type="date" min="<?=$fechamin;?>" name="fecha_entrega" id="fecha_entrega" class="form-control" required />
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="control-label">Método de Entrega</label>
            <div class="col-sm-7">
                <select class="form-control" name="id_metodo_entrega" id="id_metodo_entrega" required>
                    <option selected disabled value="">Seleccione</option>
                    @forelse($metodo_entrega  as $metodo_entregas)
                        <option value="{{ $metodo_entregas->id }}">
                            {{ $metodo_entregas->nombre }}
                        </option>
                    @empty <option>No existen</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="control-label"> Medio de Pago</label>
            <div class="col-sm-9">
                <select class="form-control" name="id_medio_pago" id="id_medio_pago" required>
                    <option selected disabled value="">Seleccione</option>
                    @forelse($medio_pago  as $medio_pagos)
                        <option value="{{ $medio_pagos->id }}">
                            {{ $medio_pagos->nombre }}
                        </option>
                    @empty <option>No existen</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="control-label">Método de Pago</label>
            <div class="col-sm-9">
                <select class="form-control" name="id_metodo_pago" id="id_metodo_pago" required>
                    <option selected disabled value="">Seleccione</option>
                    @forelse($metodo_pago  as $metodo_pagos)
                        <option value="{{ $metodo_pagos->id }}">
                            {{ $metodo_pagos->nombre }}
                        </option>
                    @empty <option>No existen</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="control-label">Abono</label>
            <div class="col-sm-9">
                <input type="number"  name="abono" id="abono" class="form-control" required/>
            </div>
        </div>
    </div>
</div>
<hr>
<h4>Información Productos</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="control-label">Productos</label>
            <div class="col-sm-9">
                <select class="form-control" name="producto" id="producto" required>
                    <option selected disabled value="">Seleccione</option>
                    @forelse($producto  as $productos)
                        <option value="{{ $productos->id }}">
                            {{ $productos->nombre }}
                        </option>
                    @empty <option>No existen</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group row">
            <label class="control-label">Cantidad</label>
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
            <label class="control-label">Descripción</label>
            <div class="col-sm-9">
                <input id="descripcion" class="form-control" style="height:5%" />
                
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="control-label">Diseño</label>
            <div class="col-sm-6">
                <button id="figura" type="button" class="form-control btn btn-success" data-toggle="modal"
                    data-target="#verdiseños" disabled>Seleccione diseño</button>
            </div>
            <div class="col-sm-6">
                <input type="hidden" id="imagen" class="form-control" style="border: 0;" readonly />
            </div>
        </div>
    </div>
    <div class="col-md-1">
    <a type="button" class="mdi mdi-plus-circle" style="color:green;font-size:400%;margin-left:40%"
                    id="agregarprodu"></a>
    </div>
    <br>
    <hr>
    <input type="hidden" name="total" id="total" />
</div>


<div style="margin-top: 3%;">
    <table id="resumen" class="table table-striped dt-responsive nowrap" style="width:70%;margin-left:15%">
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
    <button type="submit" class="btn btn-success" style="margin: 10px" >Crear</button>
    <a class="btn btn-primary " style="margin: 10px" onclick="resetForm('formpedidos')">Limpiar</a>
    <a class="btn btn-danger " href="{{ route('pedidos.index') }}" style="margin: 10px">Cancelar</a>
</div>

<!-- modal diseños -->
<div class="modal fade" id="verdiseños" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document" id="modalactualizar" style="max-width: 63%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitlediseños">Diseños Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="contenidomarcas">
                <div class="page-content container">
                    <div class="container px-0">
                        <form>
                            <div class="row mt-4" id="listadoimg">

                            </div>
                            <button id="acceptBtn" class="btn btn-primary" data-dismiss="modal"
                                aria-label="Close">Aceptar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<!-- scripts -->
<script>
    $(document).ready(function() {

        $('#agregarprodu').click(function() {
            let consulta = {!! $figuras !!}
            let producto_id = document.getElementById("producto").value;
            let producto = document.getElementById("producto");
            let selected = producto.options[producto.selectedIndex].text;
            let cantidad = document.getElementById("cantidad").value;
            let precio = document.getElementById("precio").value;
            let descripcion = document.getElementById("descripcion").value;
            let imagen = document.getElementById("imagen").value;
            if (imagen == "") {
                ruta = "";
            } else {
                let listadoimg = consulta.find(item => item.id == imagen)
                ruta = `<img src="http://127.0.0.1:8000/storage/images/figuras/${listadoimg.imagen}"/>`
            }


            if (cantidad > 0 && precio > 0) {
                $("#datosresumen").append(`
                                
                                <tr id="tr-${producto_id}">
                                <td>${ruta}</td>
                                <input type="hidden" name="producto_id[]" value="${producto_id}"/>
                                <input type="hidden" name="cantidades[]" value="${cantidad}"/>
                                <input type="hidden" name="precios[]" value="${precio}"/>
                                <input type="hidden" name="imagenes[]" value="${imagen}"/>
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

            document.getElementById("cantidad").value = "";
            document.getElementById("precio").value = "";
            document.getElementById("imagen").value = "";
            document.getElementById("descripcion").value = "";

        })



    })

    function eliminarclick(id, subtotal) {
        $("#tr-" + id).remove();
        let preciototal = $("#totalpedido").val() || 0;
        $("#totalpedido").val(parseInt(preciototal) - subtotal);
        let nuevototal = (parseInt(preciototal) - subtotal);
        $("#totalpedido").val(nuevototal);
        document.getElementById('totalpedido').innerHTML = nuevototal;
        document.getElementById('total').value = nuevototal;

    }

    function info() {
        let idseleccion = $("#id_cliente").val();
        if (idseleccion != 0) {
            let usuarioseleccion = [];
            let usuario = <?php echo $cliente; ?>;
            usuario.forEach(function(value, index) {
                usuarioseleccion[index] = value;

                if (usuarioseleccion[index].id == idseleccion) {
                    $("#cedula").val(usuarioseleccion[index].cedula);
                    $("#telefono").val(usuarioseleccion[index].telefono);
                    if (usuarioseleccion[index].tipo_comercio == 1) {
                        $("#tipo_persona").val("Mayorista");
                    }
                    if (usuarioseleccion[index].tipo_comercio == 2) {
                        $("#tipo_persona").val("Minorista");
                    }
                    $("#municipio").val(usuarioseleccion[index].id_municipio);
                    let idmunicipio = usuarioseleccion[index].id_municipio;
                    $("#direccion").val(usuarioseleccion[index].direccion);

                    let todoMunicipios = <?php echo $municipios; ?>;
                    let idDepartMunici = todoMunicipios.find(item => item.id == idmunicipio)
                    let iddepartamento = `${idDepartMunici.id_departamentos}`
                    let departament = <?php echo $departamentos; ?>;
                    let depa = departament.find(item => item.id == iddepartamento)
                    $('#departamento').val(`${depa.id}`);
                    let idpaisdepa = `${depa.id_paises}`;
                    let todoPaises = <?php echo $paises; ?>;
                    let paises = todoPaises.find(item => item.id == idpaisdepa)
                    $('#pais').val(`${paises.id}`);
                    
                    $('#fecha_entrega').val('');
                    $('#id_metodo_entrega').val('');
                    $('#id_medio_pago').val('');
                    $('#id_metodo_pago').val('');
                    $('#abono').val('');
                    $('#datosresumen').text('');
                    $('#datosresumen').val('');
                    $('#totalpedido').text(''); 
                    $('#totalpedido').val(''); 
                    $('#total').val(''); 

                     
                }
            });

            listarFiguras(idseleccion);

        }
    }

    function listarFiguras(id) {
        let listafiguras = [];
        let figura = <?php echo $figuras; ?>;
        $("#listadoimg").children().remove();
        figura.forEach(function(value, index) {
            listafiguras[index] = value;
            if (listafiguras[index].id_cliente == id) {
                let figuri = listafiguras[index].imagen;
                let idimagen = listafiguras[index].id;
                const imagen = `
                <div class="col-md-2 p-1" style="width:14%">
                    <div class="card">
                        <div class="row">
                            <div class='col text-center'>
                                <input type="radio" name="imgbackground" id="${idimagen}" class="d-none imgbgchk" value="${idimagen}">
                                <label for="${idimagen}">
                                <img src="http://127.0.0.1:8000/storage/images/figuras/${figuri}" id="${idimagen}" style="margin-top: 24%"/>
                                    <div class="tick_container">
                                        <div class="tick">
                                        <i class="fa fa-check"> </i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                                `
                $("#listadoimg").append(imagen)
            }
        });
    }


    function filtrarDepartamentos() {
    var pais = document.getElementById("pais").value;
    var selectordepartamentos = document.getElementById("departamento");
    selectordepartamentos.innerHTML = "<option value='' selected disabled>Seleccione</option>";
    let paisseleccion = [];
    let departamentos = <?php echo $departamentos; ?>;
    departamentos.forEach(function(value, index) {
        paisseleccion[index] = value;
        if (paisseleccion[index].id_paises == pais) {
            $("#departamento").append(`
                <option value="${paisseleccion[index].id}">${paisseleccion[index].nombre}</option>
            `);
        }
    });
}


    function filtrarMunicipios() {

        var departamento = document.getElementById("departamento").value;
        var selectormunicipios = document.getElementById("municipio");
        selectormunicipios.innerHTML = "<option value='' selected disabled>Seleccione</option>";
        let departamentoseleccion = [];
        let municipios = <?php echo $municipios; ?>;
        municipios.forEach(function(value, index) {
            departamentoseleccion[index] = value;
            if (departamentoseleccion[index].id_departamentos == departamento) {
                $("#municipio").append(    
                `
                <option value="${departamentoseleccion[index].id}"/>${departamentoseleccion[index].nombre}
                `);
            }
        });
    }

    document.getElementById("producto").onchange = function() {
        var value = this.value;
        if (value === "1") {
            document.getElementById("figura").disabled = false;
        } else {
            document.getElementById("figura").disabled = true;
        }
    };

    function limpiarForm() {
        var inputs = document.querySelectorAll("input:not(.no-clear)");
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = "";
        }
    }

    var modal = document.getElementById("verdiseños");
    acceptBtn.addEventListener("click", function() {
        event.preventDefault();
        var radios = document.getElementsByName("imgbackground");
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                imagen.value = radios[i].value;
                break;
            }
        }

    });

    function validar_abono() {
    var total = parseInt(document.getElementById("total").value);
    var abono = parseInt(document.getElementById("abono").value);
    if(abono > total){
        alert("El abono no puede ser mayor a el total del pedido.")
        return false;
    }
    return true;
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


    function resetForm(formpedidos) {
        document.getElementById(formpedidos).reset();
    }
</script>
