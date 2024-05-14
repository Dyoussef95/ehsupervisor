@csrf
<div class="form-group">
    <label for="">Nombre</label>
<input type="text" name="name" value="{{ isset($plan) ? $plan->name : '' }}"
class="form-control" id="" placeholder="Ingrese un nombre">
</div>

<div class="form-group">
    <label for="">Usuarios</label>
<input type="number" name="users" value="{{ isset($plan) ? $plan->users : '' }}"
class="form-control" id="" placeholder="Ingrese la cantidad de usuarios del plan">
</div>

<div class="form-group">
    <label for="">Almacenamiento (GB)</label>
<input type="number" name="storage" value="{{ isset($plan) ? $plan->storage : '' }}"
class="form-control" id="" placeholder="Ingrese la cantidad de GB del plan">
</div>
<br>

