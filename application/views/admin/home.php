<!--  Home View of Administrator -->

<!--  Carga de Paginas principales -->
<?php foreach ($pages as $page): ?>
  <p><?php echo $page->titulo;?></p>
<?php endforeach;?>

<!--  Informacion del sobre mi -->
<p><?php echo $config->tituloSobreMi; ?></p>
<img src="<?php echo site_url($photosDirectory . $config->imagenSobreMi); ?>" alt="">
<img src="<?php echo site_url($photosDirectory . $config->imagenPerfil); ?>" alt="">
<img src="<?php echo site_url($photosDirectory . $config->imagenMiTrabajo); ?>" alt="">

<!-- Social Network  -->
<?php foreach ($social as $sn): ?>
  <p><?php echo $sn->icon;?></p>
<?php endforeach;?>

<!--  Informacion del sobre mi form -->
<form enctype="multipart/form-data" class="" action="<?php echo site_url('admin/home/saveConfig');?>" method="post">
  <input type="file" name="imagenPerfil">
  <input type="text" name="telefono" value="<?php echo $config->telefono; ?>">
  <input type="text" name="email" value="<?php echo $config->email; ?>">
  <input type="text" name="tituloSobreMi" value="<?php echo $config->tituloSobreMi; ?>">
  <input type="text" name="textoSobreMi" value="<?php echo $config->textoSobreMi; ?>">
  <input type="file" name="imagenSobreMi">
  <input type="text" name="tituloMiTrabajo" value="<?php echo $config->tituloMiTrabajo; ?>">
  <input type="text" name="textoMiTrabajo" value="<?php echo $config->textoMiTrabajo; ?>">
  <input type="file" name="imagenMiTrabajo">
  <button name="button">Save</button>
</form>
