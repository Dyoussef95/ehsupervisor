@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi">
                <use xlink:href="#calendar3" />
            </svg>
            This week
        </button>
    </div>
</div>

<h2>Vista general de clientes</h2>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre del cliente</th>
                <th scope="col">Plan</th>
                <th scope="col">Usuarios contratados</th>
                <th scope="col">Usuarios actuales</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->plan->name }}</td>
                <td>{{ $client->plan->users }}</td>
                @if(isset($client->connection))
                <td @if($client->plan->users<=count($client->users))
                     class="text-bg-danger"
                     @endif
                     >{{ count($client->users) }}
                </td>
                @else
                <td>Sin conexión</td>
                @endif
            </tr>
            @empty
            <p>No hay planes registrados</p>
            @endforelse
        </tbody>
    </table>
</div>
<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
@endsection