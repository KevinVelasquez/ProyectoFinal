@extends('layouts.app')

@section('template_title')
    Create Pedido
@endsection

@section('content')

<div class="container">
    <main role="main" class="pb-3">
        <h1>Crear Pedido</h1>
        <hr />
        
        <form method="POST" action="{{ route('pedidos.store') }}" id="formpedidos" role="form" enctype="multipart/form-data" class="form-sample needs-validation" onsubmit="return validar_abono()" novalidate>
        @csrf

        @include('pedido.form')

        </form>
        
    </main>
    
@endsection
