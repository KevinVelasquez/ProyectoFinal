@extends('layouts.app')

@section('template_title')
Create Proveedor
@endsection

@section('content')

<div class="container">
    <main role="main" class="pb-3">


        @includeif('partials.errors')


        @if(Session::has('success'))
        {{Session::get('success') }}

        @endif

        <h1>Registrar Proveedor</h1>
        <hr />
        <div class="card-body">

            <form action="{{ url('/proveedor') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf

                @include('proveedor.form')


            </form>
        </div>
    </main>
</div>




@endsection