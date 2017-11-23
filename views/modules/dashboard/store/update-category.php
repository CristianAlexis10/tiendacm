<?php
$result = $this->master->selectBy('categoria',array('cat_codigo',$_GET['data']));
$_SESSION['cat_mod']=$result['cat_codigo'];
?>

<form action="actualizar-cat" method="POST">
	<input type="text" name="nombre" value="<?php echo $result['cat_categ'] ?>" required>
	<select name="estado" required>
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
	<input type="submit" value="Actualizar">
</form>