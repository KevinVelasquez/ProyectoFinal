@extends('layouts.app')

@section('template_title')
    Create Producto
@endsection

@section('content')
<div class="container" style="width:50%;margin-left: 25%;">
    <main role="main" class="pb-3">
        <h1>Crear Producto</h1>
        <hr />
        
        <form method="POST" action="{{route('productos.store')}}"  role="form" enctype="multipart/form-data" class="form-sample needs-validation" novalidate>
        @csrf

        @include('producto.form')

        </form>
        
    </main>
</div>
@endsection
