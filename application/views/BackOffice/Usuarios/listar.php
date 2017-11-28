<div class="container">
    <h1><?= $titulo ?></h1>

    <a href="<?= site_url('backoffice/usuario/crear') ?>">
        <button class="btn btn-info" type="submit">Crear usuario</button>
    </a>

    <?php
    if ($cantPaginas > 1) {
        echo "<div class='paginas'>";
        $pagina = $this->uri->segment(3);
        if ($pagina == "") $pagina = 1;
        for ($i = 0; $i < $cantPaginas; $i++) {
            echo "<a href='" . site_url('backoffice/usuarios/' . ($i + 1)) . "' class='btn pagina";
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
            <th scope="col">CLAVE</th>
            <th scope="col">ROL ID</th>
            <th scope="col">LOGIN</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        if (COUNT($usuarios) > 0) {
            foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario['usuario_id'] . "</td>";
                echo "<td>" . $usuario['usuario_nombre'] . "</td>";
                echo "<td>" . $usuario['usuario_clave'] . "</td>";
                echo "<td>" . $usuario['usuario_rol_id'] . "</td>";

                echo "<td>" . $usuario['usuario_login'] . "</td>";
                echo "<td>" . form_open('backoffice/BackOfficeUsuarios/borrar/' . $usuario['usuario_id']) . "<input type='submit' class='btn btn-outline-danger' value='Borrar'></form></td>";
                echo "<td>" . form_open('backoffice/usuario/editar/' . $usuario['usuario_id']) . "<input type='submit' class='btn btn-outline-primary' value='Editar'></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='20' style='text-align: center; color:yellow'>NO HAY USUARIOS</td></tr>";
        }
        ?>

        </tbody>
    </table>


</div>

