<div class="container">
    <h1><?= $titulo ?></h1>

    <a href="<?= site_url('backoffice/evento/crear') ?>">
        <button class="btn btn-info" type="submit">Crear tipo</button>
    </a>

    <?php
    if ($cantPaginas > 1) {
        echo "<div class='paginas'>";
        $pagina = $this->uri->segment(3);
        if ($pagina == "") $pagina = 1;
        for ($i = 0; $i < $cantPaginas; $i++) {
            echo "<a href='" . site_url('backoffice/tipos/' . ($i + 1)) . "' class='btn pagina";
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
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        if (COUNT($tipos) > 0) {
            foreach ($tipos as $tipo) {
                echo "<tr>";
                echo "<td>" . $tipo['tipo_id'] . "</td>";
                echo "<td>" . $tipo['tipo_descripcion'] . "</td>";

                echo "<td>" . form_open('backoffice/BackOfficeTipos/borrar/' . $tipo['tipo_id']) . "<input type='submit' class='btn btn-outline-danger' value='Borrar'></form></td>";
                echo "<td>" . form_open('backoffice/tipo/editar/' . $tipo['tipo_id']) . "<input type='submit' class='btn btn-outline-primary' value='Editar'></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='20' style='text-align: center; color:yellow'>NO HAY TIPOS</td></tr>";
        }
        ?>

        </tbody>
    </table>


</div>
