@extends('layouts.app')

@section('template_title')
Create Usuario
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
                    <span class="card-title">Registrar Usuario</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('usuario.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                        @csrf

                        @include('usuario.form')

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection