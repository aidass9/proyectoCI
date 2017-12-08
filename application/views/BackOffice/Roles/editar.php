<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeRoles/editar') ?>

    <input type="hidden" value="<?= $rol['rol_id']?>" name="rol_id">

    <div class="form-group">
        <label for="rol_nombre">Descripción tipo</label>
        <input type="text" class="form-control" id="rol_nombre" name="rol_nombre"
               value="<?= $rol['rol_nombre']?>">

        <label for="rol_nivel">Descripción tipo</label>
        <input type="number" class="form-control" id="rol_nivel" name="rol_nivel"
               value="<?= $rol['rol_nivel']?>">
    </div>

    <button type="submit" class="btn btn-primary">Editar rol</button>
    </form>
</div>