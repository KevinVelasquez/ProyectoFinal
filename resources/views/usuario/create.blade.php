@extends('layouts.app')

@section('template_title')
Create Usuario
@endsection

@section('content')


@includeif('partials.errors')

@if(Session::has('success'))
{{Session::get('success') }}

@endif

<div class="container" style="width:90%;margin-left: 4%;">
    <main role="main" class="pb-3" >
        <h1>Crear Usuario</h1>
        <hr />
        <form method="POST" action="{{ route('usuario.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            @csrf

            @include('usuario.form')

        </form>
    </main>
</div>


@endsection