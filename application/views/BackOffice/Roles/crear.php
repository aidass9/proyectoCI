<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeRoles/crear') ?>
    <div class="form-group">
        <label for="rol_nombre">Rol</label>
        <input type="text" class="form-control" id="rol_nombre" name="rol_nombre" placeholder="Rol">
    </div>
    <div class="form-group">
        <label for="rol_nivel">Nivel rol</label>
        <input type="number" class="form-control" id="rol_nivel" name="rol_nivel" placeholder="Nivel rol">
    </div>

    <button type="submit" class="btn btn-primary">Crear rol</button>
    </form_open>
</div>