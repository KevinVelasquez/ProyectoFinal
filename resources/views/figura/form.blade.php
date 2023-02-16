<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label class="control-label">Imagen</label>
            <div class="col-sm-9">
                <input type="file" name="imagen" id="imagen" class="form-control" required />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Etiqueta</label>
            <div class="col-sm-9">
                <input type="text" name="etiqueta" id="etiqueta" class="form-control" required />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Cliente</label>
            <div class="col-sm-9">
                <select class="form-control" name="id_cliente" id="id_cliente" required>
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
    <div class="box-footer mt20" style="margin-top:2%">
        <button type="submit" class="btn btn-success">Crear</button>
        <a class="btn btn-danger " href="{{ route('figuras.index') }}" style="margin: 10px">Cancelar</a>
    </div>
</div>


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
