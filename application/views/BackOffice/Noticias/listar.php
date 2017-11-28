<div class="container">
    <h1><?= $titulo ?></h1>

    <a href="<?= site_url('backoffice/noticia/crear') ?>">
        <button class="btn btn-info" type="submit">Crear noticia</button>
    </a>

    <?php
    if ($cantPaginas > 1) {
        echo "<div class='paginas'>";
        $pagina = $this->uri->segment(3);
        if ($pagina == "") $pagina = 1;
        for ($i = 0; $i < $cantPaginas; $i++) {
            echo "<a href='" . site_url('backoffice/noticias/' . ($i + 1)) . "' class='btn pagina";
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
            <th scope="col">SLUG</th>
            <th scope="col">USUARIO</th>
            <th scope="col">TITULO</th>
            <th scope="col">FECHA</th>
            <th scope="col">TEXTO</th>
            <th scope="col">IMAGEN</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php
        if (COUNT($noticias) > 0) {
            foreach ($noticias as $noticia) {
                echo "<tr>";
                echo "<td>" . $noticia['noticia_id'] . "</td>";
                echo "<td>" . $noticia['noticia_slug'] . "</td>";
                echo "<td>" . $noticia['Usuario'] . "</td>";
                echo "<td>" . $noticia['noticia_titulo'] . "</td>";
                echo "<td>" . $noticia['noticia_fecha'] . "</td>";
                echo "<td>" . $noticia['noticia_texto'] . "</td>";
                echo "<td>" . $noticia['noticia_imagen'] . "</td>";

                echo "<td>" . form_open('backoffice/BackOfficeNoticias/borrar/' . $noticia['noticia_id']) . "<input type='submit' class='btn btn-outline-danger' value='Borrar'></form></td>";
                echo "<td>" . form_open('backoffice/noticia/editar/' . $noticia['noticia_id']) . "<input type='submit' class='btn btn-outline-primary' value='Editar'></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='20' style='text-align: center; color:yellow'>NO HAY NOTICIAS</td></tr>";
        }
        ?>

        </tbody>
    </table>


</div>

<?php

