<!--  Carga de Paginas principales -->
<?php foreach ($pages as $page): ?>
  <p><?php echo $page->titulo;?></p>
<?php endforeach;?>

<!--  Informacion del sobre mi -->
<?php if ($config): ?>
  <p><?php echo $config->tituloSobreMi; ?></p>
<?php endif;?>

<!-- Social Network  -->
<?php foreach ($social as $sn): ?>
  <p><?php echo $sn->icon;?></p>
<?php endforeach;?>

<!--  Imagen de fondo de contacto -->
<?php if ($config): ?>
  <p><?php echo $config->portadaContacto; ?></p>
<?php endif;?>
