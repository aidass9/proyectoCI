<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeTipos/crear') ?>

    <div class="form-group">
        <label for="tipo_descripcion">Descripción tipo</label>
        <input type="text" class="form-control" id="tipo_descripcion" name="tipo_descripcion">
    </div>

    <button type="submit" class="btn btn-primary">Registrar tipo</button>
    </form>
</div>