<div class="container">
    <h1><?= $titulo ?></h1>

    <a href="<?= site_url('backoffice/evento/crear') ?>">
        <button class="btn btn-info" type="submit">Crear evento</button>
    </a>

    <?php
    if ($cantPaginas > 1) {
        echo "<div class='paginas'>";
        $pagina = $this->uri->segment(3);
        if ($pagina == "") $pagina = 1;
        for ($i = 0; $i < $cantPaginas; $i++) {
            echo "<a href='" . site_url('backoffice/eventos/' . ($i + 1)) . "' class='btn pagina";
            if ($pagina == $i + 1) echo " actual";
            echo "'>" . ($i + 1) . "</a>";
        }
        echo "</div>";
    }
    ?>

    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col">HORA</th>
            <th scope="col">FECHA</th>
            <th scope="col">POBLACIÓN</th>
            <th scope="col">PROVINCIA</th>
            <th scope="col">ORGANIZADOR</th>
            <th scope="col">TIPO</th>
            <th scope="col">DISTANCIA</th>
            <th scope="col">CARTEL</th>
            <th scope="col">REGLAMENTO</th>
            <th scope="col">SALIDA</th>
            <th scope="col">META</th>
            <th scope="col">ACTIVA</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        if (COUNT($eventos) > 0) {
            foreach ($eventos as $evento) {
                echo "<tr>";
                echo "<td>" . $evento['evento_id'] . "</td>";
                echo "<td>" . $evento['evento_descripcion'] . "</td>";
                echo "<td>" . $evento['evento_hora'] . "</td>";
                echo "<td>" . $evento['evento_fecha'] . "</td>";

                echo "<td>" . $evento['evento_poblacion'] . "</td>";
                echo "<td>" . $evento['evento_provincia'] . "</td>";
                echo "<td>" . $evento['evento_organizador'] . "</td>";
                echo "<td>" . $evento['evento_tipo'] . "</td>";
                echo "<td>" . $evento['evento_distancia'] . "</td>";
                echo "<td>" . $evento['evento_cartel'] . "</td>";

                echo "<td>" . $evento['evento_reglamento'] . "</td>";
                echo "<td>" . $evento['evento_salida'] . "</td>";
                echo "<td>" . $evento['evento_meta'] . "</td>";
                echo "<td>" . $evento['evento_activa'] . "</td>";
                echo "<td>" . form_open('backoffice/BackOfficeEventos/borrar/' . $evento['evento_id']) . "<input type='submit' class='btn btn-outline-danger' value='Borrar'></form></td>";
                echo "<td>" . form_open('backoffice/evento/editar/' . $evento['evento_id']) . "<input type='submit' class='btn btn-outline-primary' value='Editar'></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='20' style='text-align: center; color:yellow'>NO HAY EVENTOS</td></tr>";
        }
        ?>

        </tbody>
    </table>


</div>

