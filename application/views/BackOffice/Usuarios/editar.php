<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeUsuarios/editar') ?>

    <input type="hidden" value="<?= $usuario['usuario_id']?>" name="usuario_id">

    <div class="form-group">
        <label for="usuario_nombre">Nombre usuario</label>
        <input type="text" class="form-control" id="usuario_nombre" name="usuario_nombre"
               value="<?= $usuario['usuario_nombre']?>">

        <label for="usuario_clave">Constraseña</label>
        <input type="text" class="form-control" id="usuario_clave" name="usuario_clave"
               value="<?= $usuario['usuario_clave']?>">

        <label for="usuario_rol_id">ID rol</label>
        <input type="text" class="form-control" id="usuario_rol_id" name="usuario_rol_id"
               value="<?= $usuario['usuario_rol_id']?>">

        <label for="usuario_login">ID rol</label>
        <input type="text" class="form-control" id="usuario_login" name="usuario_login"
               value="<?= $usuario['usuario_login']?>">
    </div>

    <button type="submit" class="btn btn-primary">Editar usuario</button>
    </form>
</div>