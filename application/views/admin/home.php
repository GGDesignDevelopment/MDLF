<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=yes">

        <title><?php echo $title; ?></title>
        <meta name="description" content="My App description">

        <link rel="icon" href="img/favicon.ico">

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
            <!-- <div class="pages-nav">
                <a name="portfolio" href="#">portfolio</a>
            </div> -->
        </header>
        <div id="sections-container">
            <section class="image-navigator-holder">
                <my-carousel>
                    <?php foreach ($pages as $page): ?>
                    <div>
                        <h1>
                            <?php echo $page->descripcion; ?>
                        </h1>
                        <img src="<?php echo site_url($photosDirectory . $page->portada); ?>" alt="<?php echo $page->titulo; ?>">
                        <a href="<?php echo site_url('admin/page/id/' . $page->id); ?>">Ver Mas</a>
                    </div>
                    <?php endforeach;?>
                </my-carousel>
            </section>
            <section class="about">
                <div class="img-holder profile">
                    <div class="img-crop flip">
                        <img id="imgProfile" src="<?php echo site_url($photosDirectory . $config->imagenPerfil); ?>" class="flip" alt="Mariana de la Fuente">
                        <input id="imgProfileInput" type="file"/>
                    </div>
                </div>
                <div class="info-holder profile">
                    <h1>Mariana de la Fuente</h1>
                    <h2>Redes Sociales</h2>

                    <div class="icons-holder">
                        <div>
                            <iron-icon icon="custom-icons:facebook"></iron-icon>
                            <input type="text" name="linkFacebook" value="<?php echo $config->linkFacebook; ?>" placeholder="Facebook">
                        </div>
                        <div>
                            <iron-icon icon="custom-icons:twitter"></iron-icon>
                            <input type="text" name="linkTwitter" value="<?php echo $config->linkTwitter; ?>" placeholder="Twitter">
                        </div>
                        <div>
                            <iron-icon icon="custom-icons:flickr"></iron-icon>
                            <input type="text" name="linkFlickr" value="<?php echo $config->linkFlickr; ?>" placeholder="Flickr">
                        </div>
                        <div>
                            <iron-icon icon="custom-icons:instagram"></iron-icon>
                            <input type="text" name="linkInstagram" value="<?php echo $config->linkInstagram; ?>" placeholder="Instagram">
                        </div>
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
                        <input id="imgAboutMeInput" type="file"/>
                    </div>
                </div>
                <div class="info-holder about-me">
                    <input name="tituloSobreMi" value="<?php echo $config->tituloSobreMi; ?>" placeholder="Titulo sobre mi"></input>
                    <br>
                    <textarea name="textoSobreMi" placeholder="Texto sobre mi"><?php echo $config->textoSobreMi; ?></textarea>
                </div>
                <div class="img-holder my-style">
                    <div class="img-crop flip">
                        <img src="<?php echo site_url($photosDirectory . $config->imagenMiTrabajo); ?>" class="flip" alt="mi-estilo-foto">
                        <input id="imgMyStyleInput" type="file"/>
                    </div>
                </div>
                <div class="info-holder my-style">
                    <input name="tituloMiTrabajo" value="<?php echo $config->tituloMiTrabajo; ?>" placeholder="Titulo mi trabajo"></input>
                    <br>
                    <textarea name="textoMiTrabajo" placeholder="Texto mi trabajo"><?php echo $config->textoMiTrabajo; ?></textarea>
                </div>
                <button id="btnSaveAbout" data-action="<?php echo site_url('admin/home/saveConfig');?>">Guardar</button>
            </section>
        </div>
        <script src="src/main-admin.js"></script>
        <noscript>
          Please enable JavaScript to view this website.
        </noscript>
    </body>
</html>
