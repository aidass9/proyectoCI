<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeNoticias/editar') ?>

    <input type="hidden" value="<?= $noticia['noticia_id']?>" name="noticia_id">

    <div class="form-group">
        <label for="noticia_slug">Slug noticia</label>
        <input type="number" class="form-control" id="noticia_slug" name="noticia_slug" value="<?= $noticia['noticia_slug']?>">

        <label for="Usuario">Usuario</label>
        <input type="text" class="form-control" id="Usuario" name="Usuario" value="<?= $noticia['Usuario']?>">

        <label for="noticia_titulo">Titulo</label>
        <input type="text" class="form-control" id="noticia_titulo" name="noticia_titulo" value="<?= $noticia['noticia_titulo']?>">

        <label for="noticia_fecha">Fecha</label>
        <input type="text" class="form-control" id="noticia_fecha" name="noticia_fecha" value="<?= $noticia['noticia_fecha']?>">

        <label for="noticia_texto">Texto</label>
        <input type="text" class="form-control" id="noticia_texto" name="noticia_texto" value="<?= $noticia['noticia_texto']?>">

        <label for="noticia_imagen">Imagen</label>
        <input type="text" class="form-control" id="noticia_imagen" name="noticia_imagen" value="<?= $noticia['noticia_imagen']?>">



    </div>

    <button type="submit" class="btn btn-primary">Editar noticia</button>
    </form>
</div>