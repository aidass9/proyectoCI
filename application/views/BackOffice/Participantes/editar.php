<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeParticipantes/editar') ?>

    <input type="hidden" value="<?= $participante['participante_id']?>" name="participante_id">

    <div>
            <label for="participante_fecInsc">Fecha inscripción</label>
            <input type="date" class="form-control" id="participante_fecInsc" name="participante_fecInsc" value="<?= $participante['participante_fecInsc']?>">

            <label for="participante_evento_id">ID evento</label>
            <input type="number" class="form-control" id="participante_evento_id" name="participante_evento_id" value="<?= $participante['participante_evento_id']?>">

            <label for="participante_categoria">Categoria</label>
            <input type="text" class="form-control" id="participante_categoria" name="participante_categoria" value="<?= $participante['participante_categoria']?>">

            <label for="participante_nombre">Nombre</label>
            <input type="text" class="form-control" id="participante_nombre" name="participante_nombre" value="<?= $participante['participante_nombre']?>">

            <label for="participante_apellidos">Apellidos</label>
            <input type="text" class="form-control" id="participante_apellidos" name="participante_apellidos" value="<?= $participante['participante_apellidos']?>">

            <label for="participante_nif">NIF</label>
            <input type="text" class="form-control" id="participante_nif" name="participante_nif" value="<?= $participante['participante_nif']?>">

            <label for="paricipante_sexo">Sexo</label>
            <input type="text" class="form-control" id="paricipante_sexo" name="paricipante_sexo" value="<?= $participante['paricipante_sexo']?>">

            <label for="participante_poblacion">Población</label>
            <input type="text" class="form-control" id="participante_poblacion" name="participante_poblacion" value="<?= $participante['participante_poblacion']?>">

            <label for="participante_cp">Código postal</label>
            <input type="number" class="form-control" id="participante_cp" name="participante_cp" value="<?= $participante['participante_cp']?>">

            <label for="participante_pais">Pais</label>
            <input type="text" class="form-control" id="participante_pais" name="participante_pais" value="<?= $participante['participante_pais']?>">

            <label for="participante_telefono">Teléfono</label>
            <input type="number" class="form-control" id="participante_telefono" name="participante_telefono" value="<?= $participante['participante_telefono']?>">

            <label for="participante_email">Email</label>
            <input type="email" class="form-control" id="participante_email" name="participante_email" value="<?= $participante['participante_email']?>">

            <label for="participante_fechaNac">Fecha nacimiento</label>
            <input type="date" class="form-control" id="participante_fechaNac" name="participante_fechaNac" value="<?= $participante['participante_fechaNac']?>">

            <label for="participante_club">Club</label>
            <input type="text" class="form-control" id="participante_club" name="participante_club" value="<?= $participante['participante_club']?>">

            <label for="participante_dorsal">Dorsal</label>
            <input type="number" class="form-control" id="participante_dorsal" name="participante_dorsal" value="<?= $participante['participante_dorsal']?>">

            <label for="participante_posGeneral">Posición</label>
            <input type="text" class="form-control" id="participante_posGeneral" name="participante_posGeneral" value="<?= $participante['participante_posGeneral']?>">

            <label for="participante_tiempoMeta">Tiempo meta</label>
            <input type="text" class="form-control" id="participante_tiempoMeta" name="participante_tiempoMeta" value="<?= $participante['participante_tiempoMeta']?>">

    </div>

        <button type="submit" class="btn btn-primary">Editar participante</button>
    </form>
</div>