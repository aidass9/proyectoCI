<div class="container">

    <span id="mensajeBackOffice">

        <h1>¡Bienvenido a <span id="nombreAplicacion">Fun Run</span>!</h1>

    </span>


    <img class="fotoPrincipal" src="<?= base_url("assets/imagenes/eventosDeportivos.jpg") ?>">

    <h1><?= $titulo ?></h1>
    <?php
        foreach ($eventos as $evento) { ?>
            <a href="<?= site_url('evento/'.$evento['evento_id']) ?>"> <div class="alert alert-warning" role="alert">
                <span>Nombre: <?= $evento['evento_descripcion'] ?></span>
                <span class="fechaPoblacion">Fecha: <?= $evento['evento_fecha'] ?> Población: <?= $evento['evento_poblacion'] ?></span>
            </div></a>
     <?php   }
    ?>

</div>

