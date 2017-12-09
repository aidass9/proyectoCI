<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeEventos/editar') ?>

    <input type="hidden" value="<?= $evento['evento_id']?>" name="evento_id">

    <div class="form-group">
        <label for="evento_descripcion">Descripción tipo</label>
        <input type="text" class="form-control" id="evento_descripcion" name="evento_descripcion" value="<?= $evento['evento_descripcion']?>">

        <label for="evento_hora">Hora</label>
        <input type="text" class="form-control" id="evento_hora" name="evento_hora" value="<?= $evento['evento_hora']?>">

        <label for="evento_fecha">Fecha</label>
        <input type="text" class="form-control" id="evento_fecha" name="evento_fecha" value="<?= $evento['evento_fecha']?>">

        <label for="evento_poblacion">Población</label>
        <input type="text" class="form-control" id="evento_poblacion" name="evento_poblacion" value="<?= $evento['evento_poblacion']?>">

        <label for="evento_provincia">Provincia</label>
        <input type="text" class="form-control" id="evento_provincia" name="evento_provincia" value="<?= $evento['evento_provincia']?>">

        <label for="evento_organizador">Organizador</label>
        <input type="text" class="form-control" id="evento_organizador" name="evento_organizador" value="<?= $evento['evento_organizador']?>">

        <label for="evento_tipo">Tipo</label>
        <input type="text" class="form-control" id="evento_tipo" name="evento_tipo" value="<?= $evento['evento_tipo']?>">

        <label for="evento_distancia">Distancia</label>
        <input type="text" class="form-control" id="evento_distancia" name="evento_distancia" value="<?= $evento['evento_distancia']?>">

        <label for="evento_cartel">Cartel</label>
        <input type="text" class="form-control" id="evento_cartel" name="evento_cartel" value="<?= $evento['evento_cartel']?>">

        <label for="evento_reglamento">Reglamento</label>
        <input type="text" class="form-control" id="evento_reglamento" name="evento_reglamento" value="<?= $evento['evento_reglamento']?>">

        <label for="evento_salida">Salida</label>
        <input type="text" class="form-control" id="evento_salida" name="evento_salida" value="<?= $evento['evento_salida']?>">

        <label for="evento_meta">Meta</label>
        <input type="text" class="form-control" id="evento_meta" name="evento_meta" value="<?= $evento['evento_meta']?>">

        <label for="evento_activa">Activa</label>
        <input type="text" class="form-control" id="evento_activa" name="evento_activa" value="<?= $evento['evento_activa']?>">

    </div>

        <button type="submit" class="btn btn-primary">Editar evento</button>
    </form>
</div>