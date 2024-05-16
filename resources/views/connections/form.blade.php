@csrf
<div class="form-group">
    <label for="">URL</label>
<input type="text" name="url" value="{{ isset($connection) ? $connection->url : '' }}"
class="form-control" id="" placeholder="Ingrese la url">
</div>

<div class="form-group">
    <label for="">Token</label>
<input type="text" name="token" value="{{ isset($connection) ? $connection->token : '' }}"
class="form-control" id="" placeholder="Ingrese el token">
</div>





