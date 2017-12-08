<div class="container">

    <h1><?= $titulo ?></h1>

    <?php
    foreach ($noticias as $noticia) { ?>
        <a href="<?= site_url('noticia/'.$noticia['noticia_id']) ?>">
            <div class="alert alert-danger" role="alert">

                <span>Nombre: <?= $noticia['noticia_titulo'] ?></span><br>
                <span>Fecha: <?= $noticia['noticia_fecha'] ?></span><br>
                <span>Info: <?= $noticia['noticia_texto'] ?></span><br>

            </div></a>
    <?php } ?>
    ?>


</div>