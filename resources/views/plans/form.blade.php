@csrf
<div class="form-group">
    <label for="">Nombre</label>
<input type="text" name="name" value="{{ isset($plan) ? $plan->name : '' }}"
class="form-control" id="" placeholder="Ingrese un nombre">
</div>


