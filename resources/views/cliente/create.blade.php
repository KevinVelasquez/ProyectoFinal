@extends('layouts.app')

@section('template_title')
Create Cliente
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
                    <span class="card-title">Registrar Cliente</span>
                </div>
                <div class="card-body">

                    <form action="{{ url('/cliente') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        @csrf

                        @include('cliente.form')


                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection