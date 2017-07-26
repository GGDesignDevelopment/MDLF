<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=yes">

    <title>My App</title>
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
    <link rel="stylesheet" href="styles/main.css" type="text/css">
    <link rel="stylesheet" media="(max-width: 1300px)" href="styles/devices.css" />

</head>

<body>
    <header>
        <div class="title-holder">
            <h1>Mariana de la Fuente</h1>
        </div>
        <div class="pages-nav">
            <a name="portfolio" href="portfolio">portfolio</a>
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
                <!-- <div>
                    <h1>bodas</h1>
                    <p>Descripcion de bodas <br> con corte de linea</p>
                    <img src="images/bg1.jpg" alt="">
                    <button action="viewPage" page="bodas">ver pagina</button>
                </div>
                <div>
                    <h1>newborn</h1>
                    <p>Descripcion de newborn</p>
                    <img src="images/bg2.jpg" alt="">
                    <button action="viewPage" page="newborn">ver pagina</button>
                </div>
                <div>
                    <h1>quinceaños</h1>
                    <p>Descripcion de quinceaños</p>
                    <img src="images/bg3.jpg" alt="">
                    <button action="viewPage" page="quinceaños">ver pagina</button>
                </div>
                <div>
                    <h1>boudoir</h1>
                    <p>Descripcion de boudoir</p>
                    <img src="images/bg4.jpg" alt="">
                    <button action="viewPage" page="boudoir">ver pagina</button>
                </div>
                <div>
                    <h1>fashion</h1>
                    <p>Descripcion de fashion</p>
                    <img src="images/bg5.jpg" alt="">
                    <button action="viewPage" page="fashion">ver pagina</button>
                </div> -->
            </my-carousel>
        </section>
        <section class="about">
            <div class="img-holder profile">
                <div class="img-crop flip">
                    <!-- <img src="images/profilePic.jpg" class="flip" alt="Mariana de la Fuente"> -->
                    <img src="<?php echo site_url($photosDirectory . $config->imagenPerfil); ?>" class="flip" alt="Mariana de la Fuente">
                </div>
            </div>
            <div class="info-holder profile">
                <h1>Mariana de la Fuente</h1>
                <h2>Redes Sociales</h2>

                <div class="icons-holder">
                    <!-- <a href="#">
                        <iron-icon icon="custom-icons:facebook"></iron-icon>
                    </a>
                    <a href="#">
                        <iron-icon icon="custom-icons:twitter"></iron-icon>
                    </a>
                    <a href="#">
                        <iron-icon icon="custom-icons:instagram"></iron-icon>
                    </a>
                    <a href="#">
                        <iron-icon icon="custom-icons:flickr"></iron-icon>
                    </a> -->
                    <?php foreach ($social as $sn): ?>
                    
                    <a href="<?php echo $sn->url; ?>"><iron-icon icon="custom-icons:<?php echo $sn->icon; ?>"></iron-icon></a>
                    <?php endforeach;?>
                </div>
                <div class="contact-info">
                    <span>
                        <iron-icon icon="custom-icons:whatsapp"></iron-icon>
                        <?php echo $config->telefono; ?>
                    </span>
                    <span>
                        <iron-icon icon="custom-icons:email"></iron-icon>
                        <?php echo $config->email; ?>
                    </span>
                </div>
            </div>
            <div class="img-holder about-me">
                <div class="img-crop flip">
                    <!-- <img src="images/about.jpg" class="flip" alt="Mariana de la Fuente"> -->
                    <img src="<?php echo site_url($photosDirectory . $config->imagenSobreMi); ?>" class="flip" alt="sobre-mi-foto">
                </div>
            </div>
            <div class="info-holder about-me">
                <h1>
                    <!-- Sobre mi. -->
                    <?php echo $config->tituloSobreMi; ?>
                    
                </h1>
                <p>
                    <!-- 8-bit messenger bag art party viral banjo High Life keytar scenester Pinterest mlkshk cornhole crucifix literally swag vinyl heirloom Tumblr Wes Anderson twee mixtape trust fund quinoa pop-up chia sriracha ennui next level Portland Williamsburg single-origin
                    coffee vegan stumptown beard disrupt jean shorts raw denim organic gentrify lomo synth bitters Cosby sweater small batch Odd Future gastropub you probably haven't heard of them mumblecore Pitchfork meggings squid food truck semiotics
                    3 wolf moon biodiesel mustache fashion axe bespoke hella wayfarers YOLO PBR&B fixie pug plaid authentic kogi cray locavore fingerstache master cleanse Truffaut flannel -->
                    <?php echo $config->textoSobreMi; ?>
                </p>
            </div>
            <div class="img-holder my-style">
                <div class="img-crop flip">
                    <!-- <img src="images/style.jpg" class="flip" alt="Mariana de la Fuente"> -->
                    <img src="<?php echo site_url($photosDirectory . $config->imagenMiTrabajo); ?>" class="flip" alt="mi-estilo-foto">
                </div>
            </div>
            <div class="info-holder my-style">
                <h1>
                    <!-- Mi estilo. -->
                    <?php echo $config->tituloMiTrabajo; ?>
                </h1>
                <p>
                    <!-- XOXO sustainable biodiesel tofu brunch fingerstache put a bird on it vinyl tattooed street art readymade ugh sartorial gastropub pickled cred Shoreditch tote bag chia Vice raw denim Echo Park small batch actually Carles pug locavore aesthetic fixie mixtape
                    crucifix polaroid salvia seitan food truck disrupt slow-carb hella Schlitz bicycle rights wayfarers skateboard shabby chic you probably haven't heard of them kale chips drinking vinegar pork belly pour-over ethical leggings forage
                    dreamcatcher hoodie heirloom wolf freegan mustache mumblecore quinoa semiotics vegan DIY gentrify viral Austin Helvetica butcher Intelligentsia Williamsburg -->
                    <?php echo $config->textoMiTrabajo; ?>
                </p>
            </div>
        </section>
        <section class="contact-holder">
            <p>¿Queres comunicarte conmigo?</p>
            <button class="contact-button">Mandame un mensaje</button>
            <modal-element>
                <div class="top-bar">
                    <p>Mensaje Nuevo</p>
                    <button action="close">&#10006;</button>
                </div>
                <form action="<?php echo site_url('home/contact');?>">
                    <div>
                        <p class="static">Para: <span>Mariana De La Fuente</span></p>
                    </div>
                    <div>
                        <label for="email">Correo:</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="celular">Celular:</label>
                        <input type="text" name="celular" id="celular">
                    </div>
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre">
                    </div>
                    <div>
                        <textarea placeholder="Mensaje..." name="texto" id="texto"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="confirm">Enviar &#9993;</button>
                        <button class="cancel" data-text="Borrar datos">&#10006;</button>
                    </div>
                </form>
            </modal-element>
        </section>
    </div>
    <script src="src/main.js"></script>
    <noscript>
      Please enable JavaScript to view this website.
    </noscript>
</body>

</html>