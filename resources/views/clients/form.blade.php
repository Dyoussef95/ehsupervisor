@csrf
<div class="form-group">
    <label for="">Nombre</label>
<input type="text" name="name" value="{{ isset($client) ? $client->name : '' }}"
class="form-control" id="" placeholder="Ingrese un nombre">
</div>

<div class="form-group">
    <label for="">Cantidad de usuarios contratados:</label>
<input type="number" name="users" value="{{ isset($client) ? $client->users : '' }}"
class="form-control" id="" placeholder="Ingrese la cantidad de usuarios contratados">
</div>

<div class="form-group">
    <label for="">Almacenamiento (GB)</label>
<input type="number" name="storage" value="{{ isset($client) ? $client->storage : '' }}"
class="form-control" id="" placeholder="Ingrese la cantidad de GB del plan">
</div>
<br>

<div class="form-group">
    <label for="">Seleccionar plan</label>
    <select name="plan_id" form="form">
        @if (isset($plans))
            @foreach ($plans as $plan)
                <option value="{{ $plan->id }}"
                @if(isset($client->plan) && $client->plan->id==$plan->id)

                    selected

                @endif
                >{{ $plan->name }}</option>
            @endforeach
        @endif
    </select>
</div>



