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
                                    data-table="table table-striped table-hover" type="text" placeholder="Buscar" id="buscador">
                                    <br>
                                    <tbody>
                                @foreach ($figuras as $figura)
                                    <div class="card" style="width: 10rem;float: left;height: 15rem;margin: 1rem">
                                        <img class="card-img-top" style="height: 9rem;"
                                            src="{{ asset('/storage/images/figuras/' . $figura->imagen) }}"
                                            alt="Card image cap">
                                        <div class="card-body" style="padding: 0rem">
                                            <p class="card-text">{{ $figura->etiqueta }}</p>
                                            <form action="{{ route('figuras.destroy', $figura->id) }}" method="POST">
                                                <button class="mdi mdi-lead-pencil" style="height: 28%;
                                                width: 17%;"
                                                    <i href="{{ route('figuras.edit', $figura->id) }}"></i></button>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="height: 28%;
                                                width: 17%;" class="mdi mdi-delete"></button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <script>
        document.addEventListener('keyup', e=>{
            if (e.target.matches('#buscador')) {
                document.querySelectorAll('.card-text').forEach(figura => {
                    figura.textContent.toLowerCase().includes(e.target.value)
                ? figura.classList.remove('filtro')
                : figura.classList.add('filtro')
                });
            }
        })

    </script>
@endsection
