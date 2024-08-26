@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard {{$client->name}}</h1>
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

<div class="row">
    <div class="col">
        <h6>
            Plan: {{ $client->plan->name }}
        </h6>
    </div>
    <div class="col">
        <h6>
            Usuarios contratados: {{ $client->users }}
        </h6>
    </div>
    <div class="col">

    </div>
</div>

@if(isset($client->conection))

<div class="row">
    <div class="col">
        Usuarios registrados: {{ count($client->users_campus)-1 }}
    </div>
    <div class="col">
        Usuarios activos: {{ $client->active-1 }}
    </div>
    <div class="col">
        Usuarios suspendidos: {{ $client->suspended }}
    </div>
</div>
              
              


<h2>Usuarios que accedieron</h2>


<div class="table-responsive small">
    <table class="table table-striped table-sm" id="myTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mes</th>
                <th scope="col">Cantidad de usuarios que accedieron</th>
            </tr>
        </thead>
        <tbody>
            @forelse($loginsPerMonth as $logins)
                <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $logins['mes'] }}</td>
                    <td>{{ $logins['logueos'] }}</td>
                </tr>
            @empty
                <p>No hay logueos registrados</p>
            @endforelse
        </tbody>
    </table>
</div>
@endif
<!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
@endsection