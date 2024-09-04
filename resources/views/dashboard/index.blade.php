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
                <th scope="col">Usuarios activos</th>
                <th scope="col">Usuarios suspendidos</th>
                <th scope="col">Usuarios que accedieron en {{ $month }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a class="link-primary" href="{{ route('index.client', $client) }}">{{ $client->name }}</a></td>
                <td>{{ $client->plan->name }}</td>
                <td>{{ $client->users }}</td>
                @if(isset($client->conection))
                <td @if($client->users<=count($client->users_campus))
                     
                    class="text-bg-danger"
                     
                     @endif
                     >{{ $client->all-1 }}
                </td>
                <td>
                {{ $client->active-1 }}
                </td>
                <td>
                {{ $client->suspended }}
                </td>
                <td>
                {{ $client->monthAccess }}
                </td>
                
                @else
                <td>Sin conexión</td>
                <td>Sin conexión</td>
                <td>Sin conexión</td>
                <td>Sin conexión</td>
                @endif
            </tr>
            @empty
            <p>No hay planes registrados</p>
            @endforelse
        </tbody>
    </table>
</div>
<!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
@endsection