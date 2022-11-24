@extends('layouts.app')
@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Create Compra</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('compra.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('compra.form')
                        <div class="row mb-3">
                            <label for="n_orden" class="col-md-4 col-form-label text-md-end">{{ __('Número de Orden') }}</label>

                            <div class="col-md-6">
                                <input id="n_orden" type="number" class="form-control @error('n_orden') is-invalid @enderror" name="n_orden" value="{{ old('n_orden') }}" required autocomplete="n_orden" autofocus>

                                @error('n_orden')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha_compra" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Compra') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_compra" type="date" class="form-control @error('fecha_compra') is-invalid @enderror" name="fecha_compra" value="{{ old('fecha_compra') }}" required autocomplete="fecha_compra" autofocus>

                                @error('fecha_compra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total" class="col-md-4 col-form-label text-md-end">{{ __('Total') }}</label>
                            <div class="col-md-6">
                                <input id="total" type="number" class="form-control @error('total') is-invalid @enderror" name="total" value="{{ old('total') }}" required autocomplete="total" autofocus>

                                @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total" class="col-md-4 col-form-label text-md-end">{{ __('Total') }}</label>
                            <div class="col-md-6">
                                <input id="total" type="number" class="form-control @error('total') is-invalid @enderror" name="total" value="{{ old('total') }}" required autocomplete="total" autofocus>

                                @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total" class="col-md-4 col-form-label text-md-end">{{ __('Proveedor') }}</label>
                            <div class="col-md-6">
                                <input id="id_proveedor" type="text" class="form-control @error('id_proveedor') is-invalid @enderror" name="total" value="{{ old('id_proveedor') }}" required autocomplete="id_proveedor" autofocus>

                                @error('id_proveedor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection