<?php
$result = $this->master->selectBy('categoria',array('cat_codigo',$_GET['data']));
$_SESSION['cat_mod']=$result['cat_codigo'];
?>

<form action="actualizar-cat" method="post" enctype="multipart/form-data">

	Nombre:<input type="text" name="nombre" value="<?php echo $result['cat_categ'] ?>" required>

	Estado: <select name="estado" required>
		<?php
			if ($result['cat_estado']==1) {?>
				<option value="1" selected>Activa</option>
				<option value="2">Inactiva</option>
			<?php
			}else{?>
				<option value="1">Activa</option>
				<option value="2" selected>Inactiva</option>
		<?php } ?>
	</select>

	Foto :<input type="file" name="file" >

	<input type="submit" value="Actualizar">
</form>
