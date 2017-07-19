<!--  Home View of Administrator -->

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

<!--  Informacion del sobre mi -->
<form enctype="multipart/form-data" class="" action="saveConfig" method="post">
  <input type="text" name="tituloSobreMi" value="<?php echo $config->tituloSobreMi; ?>">
  <input type="text" name="textoSobreMi" value="<?php echo $config->textoSobreMi; ?>">
  <input type="file" name="imagenSobreMi">
  <input type="text" name="tituloMiTrabajo" value="<?php echo $config->tituloMiTrabajo; ?>">
  <input type="text" name="textoMiTrabajo" value="<?php echo $config->textoMiTrabajo; ?>">
  <input type="file" name="imagenMiTrabajo">
  <button name="button">Save</button>
</form>
