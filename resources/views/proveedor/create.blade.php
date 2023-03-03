@extends('layouts.app')

@section('template_title')
Create Proveedor
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                @if(Session::has('success'))
                {{Session::get('success') }}

                @endif
                <div class="card-header">
                    <span class="card-title">Registrar Proveedor</span>
                </div>
                <div class="card-body">

                    <form action="{{ url('/proveedor') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        @csrf

                        @include('proveedor.form')


                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection