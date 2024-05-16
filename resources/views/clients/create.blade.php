@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
</div>

<form action="{{ route('clients.store') }}" method="POST" role="form" id="form">
        <legend>Crear nuevo cliente</legend>

        @include('clients.form')


        <a type="button" class="btn btn-danger" href="{{ route('clients.index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Agregar</button>

</form>
@endsection