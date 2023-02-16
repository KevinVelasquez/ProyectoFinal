@extends('layouts.app')

@section('template_title')
    Realizar Abono a Proveedor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Realizar Abono a Proveedor</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pago-proveedore.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pago-proveedore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
