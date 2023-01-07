@extends('layouts.app')

@section('template_title')
Update Cliente
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Actualizar Cliente</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cliente.update', $cliente->id) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}


                        @include('cliente.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
