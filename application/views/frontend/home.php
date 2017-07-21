<!--  Carga de Paginas principales -->
<?php foreach ($pages as $page): ?>
  <p><?php echo $page->titulo;?></p>
<?php endforeach;?>

<!--  Informacion del sobre mi -->
<p><?php echo $config->tituloSobreMi; ?></p>
<img src="<?php echo site_url($photosDirectory . $config->imagenSobreMi); ?>" alt="">
<p><?php echo $config->telefono; ?></p>
<p><?php echo $config->email; ?></p>

<!-- Social Network  -->
<?php foreach ($social as $sn): ?>
  <p><?php echo $sn->icon;?></p>
<?php endforeach;?>

<!-- Contact Form -->
<form class="" action="<?php echo site_url('home/contact');?>" method="post">
  <input type="text" name="nombre" value="">
  <input type="text" name="email" value="">
  <input type="text" name="celular" value="">
  <input type="text" name="texto" value="">
  <button type="submit" name="button">Enviar</button>
</form>
