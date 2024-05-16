@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
</div>

<a type="button" class="btn btn-primary" href="{{ route('clients.create') }}">Agregar nuevo cliente</a>
<br><br>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Plan</th>
                <th scope="col">Conexión</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @forelse($clients as $client)
            <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $client -> name }}</td>
               <td>{{isset($client->plan) ? $client->plan->name : '-' }}</td>
               <td>
               <a class="link-success" href="{{ route('clients.connections.index', $client) }}">Ver conexión</a>
               </td>
               <td>
                  <a href="{{ route('clients.edit', $client) }}" class="btn btn-success btn-sm">Editar</a>
               </td>
               <td>
                  <form action="{{ route('clients.destroy', $client)}}" method="POST">
                     @method('DELETE')
                     @csrf
                     <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
               </td>
            </tr>
         @empty
            <p>No hay clientes registrados</p>
         @endforelse
        </tbody>
    </table>
</div>
@endsection