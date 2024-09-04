@csrf
<div class="form-group">
    <label for="">URL</label>
<input type="text" name="url" value="{{ isset($connection) ? $connection->url : '' }}"
class="form-control" id="" placeholder="https://urlcampus.com/">
</div>

<div class="form-group">
    <label for="">Token</label>
<input type="text" name="token" value="{{ isset($connection) ? $connection->token : '' }}"
class="form-control" id="" placeholder="Ingrese el token">
</div>

<div class="form-group">
    <label for="">ID Reporte de logueos por mes</label>
<input type="text" name="users_access_report_id" value="{{ isset($connection) ? $connection->users_access_report_id : '' }}"
class="form-control" id="" placeholder="Ingrese el ID del reporte de accesos">
</div>

<div class="form-group">
    <label for="">ID Reporte de usuarios activos</label>
<input type="text" name="users_active_report_id" value="{{ isset($connection) ? $connection->users_active_report_id : '' }}"
class="form-control" id="" placeholder="Ingrese el ID del reporte de usuarios activos">
</div>






