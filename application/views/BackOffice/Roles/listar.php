<div class="container">
    <h1><?= $titulo ?></h1>

    <a href="<?= site_url('backoffice/rol/crear') ?>">
        <button class="btn btn-info" type="submit">Crear rol</button>
    </a>

    <?php
    if ($cantPaginas > 1) {
        echo "<div class='paginas'>";
        $pagina = $this->uri->segment(3);
        if ($pagina == "") $pagina = 1;
        for ($i = 0; $i < $cantPaginas; $i++) {
            echo "<a href='" . site_url('backoffice/roles/' . ($i + 1)) . "' class='btn pagina";
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
            <th scope="col">NOMBRE</th>
            <th scope="col">NIVEL</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        if (COUNT($roles) > 0) {
            foreach ($roles as $rol) {
                echo "<tr>";
                echo "<td>" . $rol['rol_id'] . "</td>";
                echo "<td>" . $rol['rol_nombre'] . "</td>";
                echo "<td>" . $rol['rol_nivel'] . "</td>";
                echo "<td>" . form_open('backoffice/BackOfficeRoles/borrar/' . $rol['rol_id']) . "<input type='submit' class='btn btn-outline-danger' value='Borrar'></form></td>";
                echo "<td>" . form_open('backoffice/rol/editar/' . $rol['rol_id']) . "<input type='submit' class='btn btn-outline-primary' value='Editar'></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='20' style='text-align: center; color:yellow'>NO HAY ROLES</td></tr>";
        }
        ?>

        </tbody>
    </table>


</div>
