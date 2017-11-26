<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>

<div class="container">
    <?= form_open('FrontOffice/usuarios/crearUsuario') ?>
        <div class="form-group">
            <label for="usuario_login">Nombre usuario</label>
            <input type="text" class="form-control" id="usuario_login" name="usuario_login" placeholder="Nombre usuario">
        </div>
        <div class="form-group">
            <label for="usuario_clave">Contraseña</label>
            <input type="password" class="form-control" id="usuario_clave" name="usuario_clave" placeholder="Contraseña">
        </div>

        <div class="form-group">
            <label for="confirmar">Confirmar contraseña</label>
            <input type="password" class="form-control" id="confirmar" name="confirmar" placeholder="Confirmar contraseña">
        </div>

        <div class="form-group">
            <label for="usuario_nombre">Nombre</label>
            <input type="text" class="form-control" id="usuario_nombre" name="usuario_nombre" placeholder="Nombre">
        </div>

    <div>
        <a href="<?= site_url('loggin') ?>" class="btn btn-light">Iniciar sesion</a>
    </div>



        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>

</body>

</html>