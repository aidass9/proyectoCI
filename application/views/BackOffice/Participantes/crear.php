<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeParticipantes/crear') ?>

        <div class="form-row">

            <div class="form-group col-sm-6">
                <label for="participante_fecInsc">Fecha inscripción</label>
                <input type="date" class="form-control" id="participante_fecInsc" name="participante_fecInsc">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_evento_id">ID evento</label>
                <input type="number" class="form-control" id="participante_evento_id" name="participante_evento_id">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_categoria">Categoria</label>
                <input type="text" class="form-control" id="participante_categoria" name="participante_categoria">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_nombre">Nombre</label>
                <input type="text" class="form-control" id="participante_nombre" name="participante_nombre">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_apellidos">Apellidos</label>
                <input type="text" class="form-control" id="participante_apellidos" name="participante_apellidos">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_nif">NIF</label>
                <input type="text" class="form-control" id="participante_nif" name="participante_nif">
            </div>

            <div class="form-group col-sm-6">
                <label for="paricipante_sexo">Sexo</label>
                <input type="text" class="form-control" id="paricipante_sexo" name="paricipante_sexo">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_poblacion">Población</label>
                <input type="text" class="form-control" id="participante_poblacion" name="participante_poblacion">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_cp">Código postal</label>
                <input type="number" class="form-control" id="participante_cp" name="participante_cp">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-sm-6">
                <label for="participante_pais">Pais</label>
                <input type="text" class="form-control" id="participante_pais" name="participante_pais">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_telefono">Teléfono</label>
                <input type="number" class="form-control" id="participante_telefono" name="participante_telefono">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_email">Email</label>
                <input type="email" class="form-control" id="participante_email" name="participante_email">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_fechaNac">Fecha nacimiento</label>
                <input type="date" class="form-control" id="participante_fechaNac" name="participante_fechaNac">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_club">Club</label>
                <input type="text" class="form-control" id="participante_club" name="participante_club">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_dorsal">Dorsal</label>
                <input type="number" class="form-control" id="participante_dorsal" name="participante_dorsal">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_posGeneral">Posición</label>
                <input type="text" class="form-control" id="participante_posGeneral" name="participante_posGeneral">
            </div>

            <div class="form-group col-sm-6">
                <label for="participante_tiempoMeta">Tiempo meta</label>
                <input type="text" class="form-control" id="participante_tiempoMeta" name="participante_tiempoMeta">
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Registrar participante</button>
    </form>
</div>