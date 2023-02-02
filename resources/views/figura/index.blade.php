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
                                    <input class="form-control col-md-3 light-table-filter"
                                        data-table="table table-striped table-hover" type="text" placeholder="Buscar"
                                        id="buscador">
                                    <br>
                                    <tbody>
                                        <div class="demo1"></div>
                                        <div class="container">
                                            <div class="row">
                                                @foreach ($figuras as $figura)
                                                    <div class="col-md-2 p-1"
                                                        data-bs-toggle="modal"data-bs-target="#modalimagen">
                                                        <div class="card">
                                                            <img class="card-img-top"
                                                                src="{{ asset('/storage/images/figuras/' . $figura->imagen) }}"
                                                                alt="Card image cap">
                                                            <div tabindex="-1" aria-labelledby="modalimagen"
                                                                aria-hidden="true" class="modal fade" id="modalimagen">
                                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <img class="card-img-top"
                                                                            src="{{ asset('/storage/images/figuras/' . $figura->imagen) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body" style="padding: 0rem">
                                                                <p class="card-text">{{ $figura->etiqueta }}</p>
                                                                <form action="{{ route('figuras.destroy', $figura->id) }}"
                                                                    method="POST">
                                                                    <a class="mdi mdi-lead-pencil"
                                                                        style="height: 28%;width: 17%;color:black"
                                                                        href="{{ route('figuras.edit', $figura->id) }}"></a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        style="height: 28%;width: 17%;border: none;background-color: white;"
                                                                        class="mdi mdi-delete"></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <nav aria-label="Page navigation example" style="margin-left: 40%;">
                                                <ul class="pagination">
                                                    <li class="page-item"><a class="page-link" href="#">Previous</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(event) {
                $('.demo1').bootpag({
                    total: 5
                }).on("page", function(event, num) {
                    $(".content").html("Page " + num); // or some ajax content loading...

                    // ... after content load -> change total to 10
                    $(this).bootpag({
                        total: 10,
                        maxVisible: 10
                    });

                });
            })

            document.querySelectorAll("card-img-top").forEach(el => {
                el.addEventListener("click", function(ev) {
                    this.parentNode.classList.addClass("active")
                })
            })

            document.addEventListener('keyup', e => {
                if (e.target.matches('#buscador')) {
                    document.querySelectorAll('.card-text').forEach(figura => {
                        figura.textContent.toLowerCase().includes(e.target.value) ?
                            $(figura).parent().parent().removeClass('filtro') :
                            $(figura).parent().parent().addClass('filtro')
                        console.log($(figura).parent().parent())
                    });
                }
            })
        </script>
    @endsection
