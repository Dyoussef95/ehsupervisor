@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes: {{$client->name}} conexión</h1>
</div>

<form action="{{ route('clients.connections.store', $client) }}" method="POST" role="form" id="form">
        <legend>Agregar conexión a {{$client->name}}</legend>

        @include('connections.form')


        <a type="button" class="btn btn-danger" href="{{ route('clients.connections.index', $client) }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Agregar</button>

</form>
@endsection