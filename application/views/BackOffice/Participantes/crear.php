<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeEventos/crear') ?>

        <div class="form-row">

            <div class="form-group col-sm-6">
                <label for="evento_descripcion">Descripción evento</label>
                <textarea class="form-control" id="evento_descripcion" name="evento_descripcion" rows="3"></textarea>
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_hora">Hora evento</label>
                <input type="time" class="form-control" id="evento_hora" name="evento_hora">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_fecha">Fecha evento</label>
                <input type="date" class="form-control" id="evento_fecha" name="evento_fecha">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_poblacion">Población evento</label>
                <input type="text" class="form-control" id="evento_poblacion" name="evento_poblacion">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_provincia">Provincia evento</label>
                <input type="text" class="form-control" id="evento_provincia" name="evento_provincia">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_organizador">Organizador evento</label>
                <input type="text" class="form-control" id="evento_organizador" name="evento_organizador">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_tipo">Tipo evento</label>
                <input type="text" class="form-control" id="evento_tipo" name="evento_tipo">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-sm-6">
                <label for="evento_distancia">Distancia evento</label>
                <input type="number" class="form-control" id="evento_distancia" name="evento_distancia">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_cartel">Cartel evento</label>
                <input type="file" class="form-control" id="evento_cartel" name="evento_cartel">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_reglamento">Reglamento evento</label>
                <input type="file" class="form-control" id="evento_reglamento" name="evento_reglamento">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_salida">Salida evento</label>
                <input type="text" class="form-control" id="evento_salida" name="evento_salida">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_meta">Meta evento</label>
                <input type="text" class="form-control" id="evento_meta" name="evento_meta">
            </div>

            <div class="form-group col-sm-6">
                <label for="evento_activa">Activa evento</label>
                <input type="text" class="form-control" id="evento_activa" name="evento_activa">
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Registrar evento</button>
    </form>
</div>