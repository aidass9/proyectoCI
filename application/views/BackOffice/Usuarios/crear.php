<div class="container">

    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeUsuarios/crear') ?>
    <form>
        <div class="form-group">
            <label for="usuario_nombre">Nombre usuario</label>
            <input type="text" class="form-control" id="usuario_nombre" name="usuario_nombre">
        </div>
        <div class="form-group">
            <label for="usuario_clave">Contraseña</label>
            <input type="password" class="form-control" id="usuario_clave" name="usuario_clave">
        </div>

        <div class="form-group">
            <label for="confirmarPass">Confirmar contraseña</label>
            <input type="password" class="form-control" id="confirmarPass" name="confirmarPass">
        </div>

        <div class="form-group">
            <label for="usuario_rol_id">ID rol</label>
            <input type="number" class="form-control" id="usuario_rol_id" name="usuario_rol_id">
        </div>

        <div class="form-group">
            <label for="usuario_login">Login</label>
            <input type="text" class="form-control" id="usuario_login" name="usuario_login">
        </div>

        <button type="submit" class="btn btn-primary">Registrar usuario</button>
    </form>
</div>