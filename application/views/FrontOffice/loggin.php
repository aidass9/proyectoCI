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
    <?= form_open('FrontOffice/usuarios/iniciarSesion') ?>
        <div class="form-group">
            <label for="usuario_login">Usuario</label>
            <input type="text" class="form-control" id="usuario_login" name="usuario_login" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="usuario_clave">Contraseña</label>
            <input type="password" class="form-control" id="usuario_clave" name="usuario_clave" placeholder="Contraseña">
        </div>
        <a href="<?= site_url('registrar-usuario') ?>" class="btn btn-light">Crear cuenta</a>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
</div>


</body>

</html>