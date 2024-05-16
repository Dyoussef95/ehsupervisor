@csrf
<div class="form-group">
    <label for="">Nombre</label>
<input type="text" name="name" value="{{ isset($client) ? $client->name : '' }}"
class="form-control" id="" placeholder="Ingrese un nombre">
</div>

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



