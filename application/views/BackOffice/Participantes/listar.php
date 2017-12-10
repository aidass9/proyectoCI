<div class="container">
    <h1><?= $titulo ?></h1>

    <a href="<?= site_url('backoffice/participante/crear') ?>">
        <button class="btn btn-info" type="submit">Crear participante</button>
    </a>

    <?php
    if ($cantPaginas > 1) {
        echo "<div class='paginas'>";
        $pagina = $this->uri->segment(3);
        if ($pagina == "") $pagina = 1;
        for ($i = 0; $i < $cantPaginas; $i++) {
            echo "<a href='" . site_url('backoffice/participantes/' . ($i + 1)) . "' class='btn pagina";
            if ($pagina == $i + 1) echo " actual";
            echo "'>" . ($i + 1) . "</a>";
        }
        echo "</div>";
    }
    ?>

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">FECHA INSCRIPCIÓN</th>
            <th scope="col">ID EVENTO</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">NIF</th>
            <th scope="col">SEXO</th>
            <th scope="col">POBLACIÓN</th>
            <th scope="col">CÓDIGO POSTAL</th>
            <th scope="col">PAIS</th>
            <th scope="col">TELÉFONO</th>
            <th scope="col">EMAIL</th>
            <th scope="col">FECHA NACIMIENTO</th>
            <th scope="col">CLUB</th>
            <th scope="col">DORSAL</th>
            <th scope="col">POSICIÓN</th>
            <th scope="col">TIEMPO META</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        if (COUNT($participantes) > 0) {
            foreach ($participantes as $participante) {
                echo "<tr>";
                echo "<td>" . $participante['participante_fecInsc'] . "</td>";
                echo "<td>" . $participante['participante_evento_id'] . "</td>";
                echo "<td>" . $participante['participante_categoria'] . "</td>";
                echo "<td>" . $participante['participante_nombre'] . "</td>";

                echo "<td>" . $participante['participante_apellidos'] . "</td>";
                echo "<td>" . $participante['participante_nif'] . "</td>";
                echo "<td>" . $participante['paricipante_sexo'] . "</td>";
                echo "<td>" . $participante['participante_poblacion'] . "</td>";
                echo "<td>" . $participante['participante_cp'] . "</td>";
                echo "<td>" . $participante['participante_pais'] . "</td>";

                echo "<td>" . $participante['participante_telefono'] . "</td>";
                echo "<td>" . $participante['participante_email'] . "</td>";
                echo "<td>" . $participante['participante_fechaNac'] . "</td>";
                echo "<td>" . $participante['participante_club'] . "</td>";
                echo "<td>" . $participante['participante_dorsal'] . "</td>";
                echo "<td>" . $participante['participante_posGeneral'] . "</td>";
                echo "<td>" . $participante['participante_tiempoMeta'] . "</td>";
                echo "<td>" . form_open('backoffice/BackOfficeParticipantes/borrar/' . $participante['participante_id']) . "<input type='submit' class='btn btn-outline-danger' value='Borrar'></form></td>";
                echo "<td>" . form_open('backoffice/participante/editar/' . $participante['participante_id']) . "<input type='submit' class='btn btn-outline-primary' value='Editar'></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='20' style='text-align: center; color:yellow'>NO HAY PARTICIPANTES</td></tr>";
        }
        ?>

        </tbody>
    </table>


</div>

