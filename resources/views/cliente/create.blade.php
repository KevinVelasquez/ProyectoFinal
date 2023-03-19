@extends('layouts.app')

@section('template_title')
Create Cliente
@endsection

@section('content')
<div class="container">
    <main role="main" class="pb-3">



        @includeif('partials.errors')


        @if(Session::has('success'))
        {{Session::get('success') }}

        @endif
        <h1>Registrar Cliente</h1>
        <hr />

        <div class="card-body">

            <form action="{{ url('/cliente') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf

                @include('cliente.form')


            </form>

        </div>
    </main>
</div>


@endsection