
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Carreras populares</a>
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

            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('BackOffice') ?>">BackOffice</a>
            </li>

        </ul>
        <a href="<?= site_url('loggin') ?>">Iniciar sesión</a>
        <a href="<?= site_url('FrontOffice/usuarios/cerrarSesion') ?>"> Cerrar sesión</a>
    </div>
</nav>