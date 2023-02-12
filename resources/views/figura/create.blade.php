@extends('layouts.app')

@section('template_title')
    Create Figura
@endsection

@section('content')
<div class="container" style="width:50%;margin-left: 25%;">
    <main role="main" class="pb-3">
        <h1>Crear Figura</h1>
        <hr />
        
        <form method="POST" action="{{ route('figuras.store') }}"  role="form" enctype="multipart/form-data" class="form-sample needs-validation" novalidate>
        @csrf

        @include('figura.form')

        </form>
        
    </main>
    
@endsection