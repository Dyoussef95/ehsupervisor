@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes: {{$client->name}} conexión</h1>
</div>

<form action="{{ route('clients.connections.update', [$client, $connection]) }}" method="POST" role="form" id="form">
        <legend>Editar conexión de {{$client->name}}</legend>
        @method('PATCH')
        @include('connections.form')


        <a type="button" class="btn btn-danger" href="{{ route('clients.connections.index', $client) }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Editar</button>

</form>
@endsection