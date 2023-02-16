<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            <label class="control-label">Nombre</label>
            <div class="col-sm-9">
                <input type="text" name="nombre" id="nombre" class="form-control" required />
            </div>
            <div class="form-group">
                <label class="control-label">Imagen</label>
                <div class="col-sm-9">
                    <input type="file" name="imagen" id="imagen" class="form-control" required />
                </div>
            </div>
        </div>

        <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">Crear</button>
            <a class="btn btn-primary" href="{{ route('productos.index')}}" style="margin: 10px;  margin-top: 7%;">Cancelar</a>
            </div>
        </div>
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