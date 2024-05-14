@extends('index')

@section('title')
    Editar area {{ $area->nombre }}
@endsection

@section('content')
    
    <form action="/areas/{{$area->id}}" method="POST" role="form">
        @method('PATCH')
        @csrf
        <legend>Editar area</legend>

        @include('areas._form')
    
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
     
@endsection 