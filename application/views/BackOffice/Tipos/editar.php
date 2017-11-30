<?php print_r($tipo)?>

<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeTipos/editar') ?>

    <input type="hidden" value="<?= $tipo['tipo_id']?>" name="tipo_id">

    <div class="form-group">
        <label for="tipo_descripcion">Descripción tipo</label>
        <input type="text" class="form-control" id="tipo_descripcion" name="tipo_descripcion"
               value="<?= $tipo['tipo_descripcion']?>">
    </div>

    <button type="submit" class="btn btn-primary">Editar tipo</button>
    </form>
</div>
