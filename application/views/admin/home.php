<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=yes">

    <title><?php echo $title; ?></title>
    <meta name="description" content="My App description">

    <link rel="icon" href="images/favicon.ico">

    <!-- See https://goo.gl/OOhYW5 -->
    <link rel="manifest" href="manifest.json">

    <!-- See https://goo.gl/qRE0vM -->
    <meta name="theme-color" content="#3f51b5">

    <!-- Load webcomponents-loader.js to check and load any polyfills your browser needs -->
    <script src="src/webcomponentsjs/webcomponents-loader.js"></script>

    <!-- Load your application shell -->
    <script src="src/bundle.js"></script>

    <!-- Add any global styles for body, document, etc. -->
    <link rel="stylesheet" href="styles/home-admin.css" type="text/css">
    <link rel="stylesheet" media="(max-width: 1300px)" href="styles/devices.css" />

</head>

<body>
    <header>
        <div class="title-holder">
            <h1>Mariana de la Fuente</h1>
        </div>
        <div class="pages-nav">
            <a name="portfolio" href="#">portfolio</a>
        </div>
    </header>
    <div id="sections-container">
        <section class="image-navigator-holder">
            <my-carousel>
                <?php foreach ($pages as $page): ?>
                <div>
                    <h1>
                        <?php echo $page->titulo; ?>
                    </h1>
                    <p>
                        <?php echo $page->descripcion; ?>
                    </p>
                    <img src="<?php echo site_url($photosDirectory . $page->portada); ?>" alt="<?php echo $page->titulo; ?>">
                    <button action="viewPage" page="<?php echo $page->id; ?>">ver mas</button>
                </div>
                <?php endforeach;?>
            </my-carousel>
        </section>
        <section class="about">
            <div class="img-holder profile">
                <div class="img-crop flip">
                    <img src="<?php echo site_url($photosDirectory . $config->imagenPerfil); ?>" class="flip" alt="Mariana de la Fuente">
                </div>
            </div>
            <div class="info-holder profile">
                <h1>Mariana de la Fuente</h1>
                <h2>Redes Sociales</h2>

                <div class="icons-holder">
                    <?php foreach ($social as $sn): ?>
                    <div>
                        <iron-icon icon="custom-icons:<?php echo $sn->icon; ?>"></iron-icon>
                        <input type="text" name="" value="<?php echo $sn->url; ?>">
                    </div>
                    <?php endforeach;?>
                    <div>
                        <iron-icon icon="custom-icons:whatsapp"></iron-icon>
                        <input name="telefono" value="<?php echo $config->telefono; ?>" placeholder="Telefono"></input>
                    </div>
                    <div>
                        <iron-icon icon="custom-icons:email"></iron-icon>
                        <input name="email" value="<?php echo $config->email; ?>" placeholder="Email"></input>
                    </div>
                </div>
            </div>
            <div class="img-holder about-me">
                <div class="img-crop flip">
                    <img src="<?php echo site_url($photosDirectory . $config->imagenSobreMi); ?>" class="flip" alt="sobre-mi-foto">
                </div>
            </div>
            <div class="info-holder about-me">
                <input class="h1" name="tituloSobreMi" value="<?php echo $config->tituloSobreMi; ?>" placeholder="Titulo sobre mi"></input>
                <br>
                <textarea name="textoSobreMi" placeholder="Texto sobre mi"><?php echo $config->textoSobreMi; ?></textarea>
            </div>
            <div class="img-holder my-style">
                <div class="img-crop flip">
                    <img src="<?php echo site_url($photosDirectory . $config->imagenMiTrabajo); ?>" class="flip" alt="mi-estilo-foto">
                </div>
            </div>
            <div class="info-holder my-style">
                <input class="h1" name="tituloMiTrabajo" value="<?php echo $config->tituloMiTrabajo; ?>" placeholder="Titulo mi trabajo"></input>
                <br>
                <textarea name="textoMiTrabajo" placeholder="Texto mi trabajo"><?php echo $config->textoMiTrabajo; ?></textarea>
            </div>
            <button id="btnSaveAbout" data-action="<?php echo site_url('admin/home/saveConfig');?>">Save</button>
        </section>
    </div>
    <script src="src/main-admin.js"></script>
    <noscript>
      Please enable JavaScript to view this website.
    </noscript>
</body>

</html>
