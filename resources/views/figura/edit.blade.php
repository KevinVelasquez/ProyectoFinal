@extends('layouts.app')

@section('template_title')
    Update Figura
@endsection

@section('content')
    <div class="container" style="width:50%;margin-left: 25%;">
        <main role="main" class="pb-3">
            <h1>Actualizar Figura</h1>
            <hr />

            <form method="POST" action="{{ route('figuras.update', $figura->id) }}" role="form"
                enctype="multipart/form-data" class="form-sample needs-validation" novalidate>
                {{ method_field('PATCH') }}
                @csrf

                <input type="hidden" name="id" {{ $figura->id }} />

                <div class="form-group">
                    <label class="control-label">Figura</label>
                    <image height="200px" src="{{ asset('/storage/images/figuras/' . $figura->imagen) }}" />
                    </td>
                    <div class="col-sm-9">
                        <input type="file" name="imagen" id="imagen" class="form-control" style="margin-top: 2%;" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Etiqueta</label>
                    <div class="col-sm-9">
                        <input type="text" name="etiqueta" id="etiqueta" class="form-control"
                            value="{{ $figura->etiqueta }}"required />
                    </div>
                </div>
                <label class="control-label">Cliente</label>
                <div class="col-sm-9">
                    <select class="form-control" name="id_cliente" id="id_cliente" required>
                        <option value="{{ $figuracliente[0]->id_cliente }}">{{ $figuracliente[0]->nombre }}</option>
                        @forelse($cliente  as $clientes)
                            <option value="{{ $clientes->id }}">
                                {{ $clientes->nombre }}
                            </option>
                        @empty <option>No existen</option>
                        @endforelse
                    </select>
                </div>
                <div class="box-footer mt20" style="margin-top: 2%;">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a class="btn btn-danger " href="{{ route('figuras.index') }}" style="margin: 10px">Cancelar</a>

                </div>
            </form>
    </div>
    </div>
    </div>
    </div>
    </section>
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
