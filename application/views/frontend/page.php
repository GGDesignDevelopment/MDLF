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
        <div class="pages-nav">
            <a name="portfolio" href="<?php echo site_url(); ?>">portfolio</a>
        </div>
    </header>
    <div id="sections-container">
        <section class="page-info">
            <div class="image-holder">
                <img src="<?php echo site_url($photosDirectory . $page->portada); ?>" alt="Portada">
            </div>
            <div class="info-holder">
                <h1><?php echo $page->titulo; ?></h1>
                <p><?php echo $page->texto; ?></p>
            </div>
        </section>
        <section class="page-content">
            <div class="page-children">

            </div>
            <div class="page-photos">

            </div>
        </section>
    </div>
    <!-- <script src="<?php // echo site_url('src/main.js'); ?>"></script> -->
    <noscript>
      Please enable JavaScript to view this website.
    </noscript>
</body>

</html>
