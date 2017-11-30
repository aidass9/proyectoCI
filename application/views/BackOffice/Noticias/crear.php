<div class="container">
    <h1 class="titulo"><?=strtolower($titulo) ?></h1>

    <?= form_open('BackOffice/BackOfficeNoticias/crear') ?>

        <div class="form-group">
            <label for="noticia_slug">Slug noticia</label>
            <input type="number" class="form-control" id="noticia_slug" name="noticia_slug">
        </div>

        <div class="form-group">
            <label for="Usuario">Noticia</label>
            <input type="text" class="form-control" id="Usuario" name="Usuario">
        </div>

        <div class="form-group">
            <label for="noticia_titulo">Titulo noticia</label>
            <input type="text" class="form-control" id="noticia_titulo" name="noticia_titulo">
        </div>

        <div class="form-group">
            <label for="noticia_fecha">Fecha noticia</label>
            <input type="date" class="form-control" id="noticia_fecha" name="noticia_fecha">
        </div>

        <div class="form-group">
            <label for="noticia_texto">Texto noticia</label>
            <textarea id="noticia_texto" class="form-control" name="noticia_texto"></textarea>
        </div>

        <div class="form-group">
            <label for="noticia_imagen">Imagen noticia</label>
            <input type="file" class="form-control" id="noticia_imagen" name="noticia_imagen">
        </div>

        <button type="submit" class="btn btn-primary">Registrar noticia</button>
    </form>
</div>