@extends('layouts.app')

@section('template_title')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <main role="main" class="pb-3">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-sm-6" id="tituloinicial">
                                <h3 class="mb-0 font-weight-bold">Productos</h3>
                            </div>
                        </div>
                    </div>
                        <p>
                            <a class="mdi mdi-tag-plus-outline " id="iconoadd"
                            href="{{ route('productos.create') }}"></a>
                        </p>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <form action="{{ route('productos.search') }}" method="GET">
                                    <div class="form-group" id="formsearch">
                                        <input type="text" name="search" class="form-control" id="search"
                                            placeholder="Buscar" value="{{ request()->input('search') }}"
                                            style="width:25%;">
                                    </div>
                                </form>
                                <br>
                                <tbody>
                                    <div class="demo1"></div>
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($productos as $producto)
                                            <div class="col-md-2 p-1" >
                                                <div class="card card-fixed-height" style="height: 290px">
                                                    <img class="card-img-top"
                                                    src="http://127.0.0.1:8000/storage/images/productos/{{$producto->imagen}}"
                                                        alt="Card image cap" 
                                                        data-bs-toggle="modal"data-bs-target="#modalimagen<?php echo $producto->id; ?>" >
                                                    <div id="activ" class="dispop<?php echo $producto->estado; ?>"></div>
                                                    <div tabindex="-1"
                                                        aria-labelledby="modalimagen <?php echo $producto->id; ?>"
                                                        aria-hidden="true" class="modal fade"
                                                        id="modalimagen<?php echo $producto->id; ?>">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 445px;">
                                                            <div class="modal-content">
                                                                <img 
                                                                    src="http://127.0.0.1:8000/storage/images/productos/{{$producto->imagen}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" style="padding: 0rem">
                                                        <p class="card-text">{{ $producto->nombre }}</p>
                                                        <div>
                                                            <a class="mdi mdi-lead-pencil"
                                                                style="height: 28%;width: 17%;color:black"
                                                                href="{{ route('productos.edit',$producto->id) }}"></a>
                                                            <button onclick="eliminarProducto('{{ $producto->id }}')"
                                                                style="height: 28%;width: 17%;border: none;background-color: white;"
                                                                class="mdi mdi-delete" data-toggle="modal"
                                                                data-target="#eliminarmodal"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </tbody>
                            </table>
                            {{$productos->links()}}
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
    <!-- modal eliminar producto -->
    <div class="modal fade" id="eliminarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitleeliminar"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <form method="POST" action="{{ route('productos.eliminarproducto') }}" class="form-sample"
                        role="form" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <div>¿Está seguro que desea eliminar el producto?</div>
                        <input type="hidden" name="ideliminar" id="ideliminar" />
                        <button type="submit" class="btn btn-primary" style="background-color: #81242E;
                            border-color: #81242E;">Si</button>
                        <button type="button" class="btn btn-primary" style="background-color: #565656;
                            border-color: #565656;" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.querySelectorAll("card-img-top").forEach(el => {
        el.addEventListener("click", function(ev) {
            this.parentNode.classList.addClass("active")
        })
    })

    document.getElementById("search").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            document.getElementById("formsearch").submit();
        }
    });

    function eliminarProducto(id) {
        let consulta = {!! $filtro !!}
        let datos = consulta.find(item => item.id == id)
        $('#exampleModalLongTitleeliminar').text(`Eliminar Producto`);
        $('#ideliminar').val(`${datos.id}`);
    }
    </script>
    @endsection