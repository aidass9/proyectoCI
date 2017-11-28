
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">BACKOFFICE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backoffice/noticias/1') ?>">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backoffice/roles/1') ?>">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backoffice/eventos/1') ?>">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backoffice/tipos/1') ?>">Tipos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('backoffice/usuarios/1') ?>">Usuarios</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('') ?>">FrontOffice</a>
                </li>




            </ul>
        </div>
    </nav>

    <br><br>

<?php
$this->form_validation->set_error_delimiters("<div class='container alert alert-danger'>", "</div>");
echo validation_errors();
?>