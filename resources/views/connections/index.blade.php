@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes: {{$client->name}} conexión</h1>
</div>
@isset($client->connection)
<a type="button" class="btn btn-primary" href="{{ route('clients.connections.edit', [$client, $client->connection]) }}">Editar conexión</a>
@endisset
@empty($client->connection)
<a type="button" class="btn btn-primary" href="{{ route('clients.connections.create', $client) }}">Agregar conexión</a>
@endempty

<br><br>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">URL</th>
                <th scope="col">Token</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            @isset($client->connection)
               <td>{{ $client -> connection -> url }}</td>
               <td>{{ $client -> connection -> token }}</td>
               <td>
                  <form action="{{ route('clients.destroy', $client)}}" method="POST">
                     @method('DELETE')
                     @csrf
                     <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
               </td>
            @endisset
            @empty($client->connection)
            <p>No hay una conexión registrada</p>
            @endempty
            </tr>
        </tbody>
    </table>
</div>
@endsection