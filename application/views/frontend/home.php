<!--  Carga de Paginas principales -->
<?php foreach ($pages as $page): ?>
  <p><?php echo $page->titulo;?></p>
<?php endforeach;?>

<!--  Informacion del sobre mi -->
<p><?php echo $config->tituloSobreMi; ?></p>
<img src="<?php echo $photosDirectory . $config->imagenSobreMi; ?>" alt="">

<!-- Social Network  -->
<?php foreach ($social as $sn): ?>
  <p><?php echo $sn->icon;?></p>
<?php endforeach;?>

<!-- Contact Form -->
<form class="" action="home/contact" method="post">
  <input type="text" name="nombre" value="Juan">
  <input type="text" name="email" value="Juan@gg.com">
  <input type="text" name="celular" value="12345678">
  <input type="text" name="texto" value="Hola soy juan.">
  <button type="submit" name="button">Enviar</button>
</form>
