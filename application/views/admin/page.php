<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=yes">

    <title><?php echo $title; ?></title>
    <meta name="description" content="My App description">

    <link rel="icon" href="<?php  echo site_url('img/favicon.ico'); ?>">

    <!-- See https://goo.gl/OOhYW5 -->
    <link rel="manifest" href="manifest.json">

    <!-- See https://goo.gl/qRE0vM -->
    <meta name="theme-color" content="#3f51b5">

    <!-- Load webcomponents-loader.js to check and load any polyfills your browser needs -->
    <!-- <script src="src/webcomponentsjs/webcomponents-loader.js"></script> -->

    <!-- Load your application shell -->
    <!-- <script src="src/bundle.js"></script> -->

    <!-- Add any global styles for body, document, etc. -->
    <link rel="stylesheet" href="<?php  echo site_url('styles/page.css'); ?>" type="text/css">
    <link rel="stylesheet" media="(max-width: 1300px)" href="<?php  echo site_url('styles/devices.css'); ?>" />

</head>

<body>
    <header>
        <div class="title-holder">
            <h1>Mariana de la Fuente</h1>
        </div>
        <div class="toolbar">
            <button id="btnSave" data-action="<?php echo site_url('admin/page/save/' . $page->id)?>">Guardar</button>
            <?php if($page->id && $page->id!=0) {?>
                <button id="btnDelete" data-action="<?php echo site_url('admin/page/delete/' . $page->id)?>">Borrar</button>
                <button id="btnNew" data-link="<?php echo site_url('admin/page/id')?>">Crear</button>
            <?php } else { ?>
                <button id="btnCancel">Cancelar </button>
            <?php  }?>
    </div>
        <div class="pages-nav">
            <a name="inicio" href="<?php echo site_url('admin'); ?>">Inicio</a>
        </div>
    </header>
    <div id="sections-container">
        <section class="page-info">
            <div class="image-holder">
                <a href="<?php echo site_url(($page->padre!=0)?'admin/page/id/' . $page->padre:'admin')?>">Volver</a>
                <img src="<?php echo site_url($photosDirectory . $page->portada); ?>" alt="<?php echo $page->titulo; ?>">
                <input id="imgPortada" type="file"/>
            </div>
            <div class="info-holder">
                <input name="titulo" value="<?php echo $page->titulo; ?>" placeholder="Titulo Pagina"></input>
                <br>
                <textarea name="texto" placeholder="Texto de Pagina"><?php echo $page->texto; ?></textarea>
                <select name="padre">
                    <option value="0">Inicio</option>
                    <?php if($padres) { foreach ($padres as $padre): if($padre->id != $page->id) {?>
                        <option value="<?php echo $padre->id; ?>" <?php if($padre->id == $page->padre) {echo 'selected';} ?>><?php echo $padre->titulo; ?></option>
                    <?php } endforeach; } ?>
                </select>
            </div>
        </section>
        <section class="page-content">
            <?php if($folders) {?>
                <h2>Albumes</h2>
                <div class="page-albums">
                    <?php foreach ($folders as $folder): ?>
                            <a href="<?php echo site_url('admin/page/id/' . $folder->id); ?>">
                                <img src="<?php echo site_url($photosDirectory . $folder->portada); ?>" alt="<?php echo   $folder->titulo; ?>">
                                <span><?php echo $folder->titulo; ?></span>
                            </a>
                    <?php endforeach;?>
                </div>
            <?php } ?>
            <?php if($photos) {?>
                <h2>Fotos</h2>
                <div class="page-photos">
                  <?php foreach ($photos as $photo): ?>
                      <img src="<?php echo site_url($photosDirectory . $photo->foto); ?>">
                  <?php endforeach;?>
                </div>
            <?php } ?>
        </section>
    </div>
    <div id="modal-content">
        <span id="modal-close" class="modal-control close-btn">&times;</span>
        <?php foreach ($photos as $photo): ?>
            <img class="modal-image" src="<?php echo site_url($photosDirectory . $photo->foto); ?>">
        <?php endforeach;?>
        <span id="modal-prev" class="modal-control prev-btn">&#10094;</span>
        <span id="modal-next" class="modal-control next-btn">&#10095;</span>
    </div>
    <script src="<?php echo site_url('src/page-admin.js'); ?>"></script>
    <noscript>
        Please enable JavaScript to view this website.
    </noscript>
</body>

</html>
