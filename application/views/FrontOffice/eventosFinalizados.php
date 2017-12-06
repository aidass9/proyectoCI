<div class="container">

    <h1><?= $titulo ?></h1>

    <?php
    foreach ($eventos as $evento) { ?>
        <a href="<?= site_url('evento/'.$evento['evento_id']) ?>"> <div class="alert alert-info" role="alert">
                <span>Nombre: <?= $evento['evento_descripcion'] ?></span>
                <span class="fechaPoblacion">Fecha: <?= $evento['evento_fecha'] ?> Población: <?= $evento['evento_poblacion'] ?></span>
            </div></a>
    <?php   }
    ?>

</div>