@extends('layouts.app')

@section('template_title')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <main role="main" class="pb-3">
                        <p>
                            <a class="mdi mdi-shape-plus" id="iconoadd" href="{{ route('figuras.create') }}"></a>
                        </p>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <form action="{{ route('figuras.search') }}" method="GET" >
                                        <div class="form-group" id="formsearch">
                                            <input type="text" name="search" class="form-control" id="search"
                                                placeholder="Buscar" value="{{ request()->input('search') }}" style="width: 20%;">
                                        </div>
                                    </form>
                                    <br>
                                    <tbody>
                                        <div class="demo1"></div>
                                        <div class="container">
                                            <div class="row">
                                                @foreach ($figuras as $figura)
                                                    <div class="col-md-2 p-1">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="{{ asset('/storage/images/figuras/' . $figura->imagen) }}"
                                                                alt="Card image cap"
                                                                data-bs-toggle="modal"data-bs-target="#modalimagen<?php echo $figura->id; ?>">
                                                            <div id="activ" class="dispo<?php echo $figura->estado; ?>"></div>
                                                            <div tabindex="-1"
                                                                aria-labelledby="modalimagen<?php echo $figura->id; ?>"
                                                                aria-hidden="true" class="modal fade"
                                                                id="modalimagen<?php echo $figura->id; ?>">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered"
                                                                    style="max-width: 445px;">
                                                                    <div class="modal-content">
                                                                        <img
                                                                            src="{{ asset('/storage/images/figuras/' . $figura->imagen) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body" style="padding: 0rem">
                                                                <p class="card-text">{{ $figura->etiqueta }}</p>
                                                                <div>
                                                                    <a class="mdi mdi-lead-pencil"
                                                                        style="height: 28%;width: 17%;color:black"
                                                                        href="{{ route('figuras.edit', $figura->id) }}"></a>
                                                                    <button onclick="eliminarFigura('{{ $figura->id }}')"
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
                                {{ $figuras->links() }}
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- modal eliminar figura -->
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
                        <form method="POST" action="{{ route('figuras.eliminarfigura') }}" class="form-sample"
                            role="form" enctype="multipart/form-data">
                            @method('DELETE')
                            @csrf
                            <div>¿Está seguro que desea eliminar la figura?</div>
                            <input type="hidden" name="ideliminar" id="ideliminar" />
                            <button type="submit" class="btn btn-primary">Si</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
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

            function eliminarFigura(id) {
                let consulta = {!! $filtro !!}
                let datos = consulta.find(item => item.id == id)
                $('#exampleModalLongTitleeliminar').text(`Eliminar Figura`);
                $('#ideliminar').val(`${datos.id}`);
            }
        </script>
    @endsection
