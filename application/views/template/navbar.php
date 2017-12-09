<?php

$permisos = null;

if (isset($_SESSION['usuario'])) {
    $permisos = $_SESSION['usuario']['usuario_rol_id'];
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= site_url('') ?>">Fun Run</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('eventosFinalizados') ?>">Eventos finalizados</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('noticias') ?>">Noticias</a>
            </li>

            <?php

            if($permisos == 1 || $permisos == 2) {
                ?>
                <li class="nav-item">
                <a class="nav-link" href="<?= site_url('BackOffice') ?>">BackOffice</a>
            </li>
           <?php
            }
            ?>


        </ul>


        <?php
            if(isset($_SESSION['usuario'])) {
        ?>
                <span class="loggin"><?= $_SESSION['usuario']['usuario_login'] ?></span>
                <a href="<?= site_url('FrontOffice/usuarios/cerrarSesion') ?>"> Cerrar sesión</a>

        <?php } else { ?>

        <a href="<?= site_url('loggin') ?>">Iniciar sesión </a>
        <?php } ?>
    </div>
</nav>

<br><br>

<?php
    $this->form_validation->set_error_delimiters("<div class='container alert alert-danger'>", "</div>");
    echo validation_errors();
?>