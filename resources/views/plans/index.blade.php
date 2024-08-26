@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Planes</h1>
</div>

<a type="button" class="btn btn-primary" href="{{ route('plans.create') }}">Agregar nuevo plan</a>
<br><br>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
        @forelse($plans as $plan)
            <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $plan -> name }}</td>
               <td>
                  <a href="{{ route('plans.edit', $plan) }}" class="btn btn-success btn-sm">Editar</a>
               </td>
               <td>
                  <form action="{{ route('plans.destroy', $plan)}}" method="POST">
                     @method('DELETE')
                     @csrf
                     <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
               </td>
            </tr>
         @empty
            <p>No hay planes registrados</p>
         @endforelse
        </tbody>
    </table>
</div>
@endsection