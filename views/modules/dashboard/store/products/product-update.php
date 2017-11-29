<?php
$data = $this->master->selectBy('producto',array('pro_codigo',$_GET['data']));
$_SESSION['update_pro']=$_GET['data'];
?>
<div class="contenido">
	<form class="form-producto" action="guardar-modificacion-producto" method="post" enctype="multipart/form-data">
      	<div class="caja">
          <label for="">nombre: </label>
      		<input type="text" name="data[]"  value="<?php echo $data['pro_nombre']?>" required>
      	</div>
      	<div class="caja">
          <label for="">precio: </label>
      		<input type="text" name="data[]" value="<?php echo $data['pro_precio']?>" required>
      	</div>
      	<div class="caja">
          <label for="">cantidad: </label>
      		<input type="number" name="data[]"  value="<?php echo $data['pro_cant']?>" required>
      	</div>
      	<div class="caja">
          <label for="">descripción: </label>
      		<input type="text" name="data[]" value="<?php echo $data['pro_des']?>" required>
      	</div>
      	<div class="caja">
          <label for="">categoria: </label>
      		<select required name="data[]">
            <option value="">seleccionar categoria</option>
      			<?php
      				foreach ($this->master->selectAll('categoria') as $row) {
      					if ($row['cat_codigo']==$data['cat_codigo']) {?>
      						<option value="<?php echo $row['cat_codigo']?>" selected><?php echo $row['cat_nombre'] ?></option>
      					<?php }else{ ?>
      					<option value="<?php echo $row['cat_codigo']?>"><?php echo $row['cat_nombre'] ?></option>
      				<?php
      					}
      				}
      			?>
      		</select>
      	</div>
      	<div class="caja">
      		estado:<select name="data[]">
      			<?php
      				if ($data['pro_estado']=="activo") {?>
      					<option value="activo" selected>Activo</option>	
      					<option value="inactivo">Inactivo</option>	
      				<?php }else{?>
      					<option value="activo" >Activo</option>	
      					<option value="inactivo" >Inactivo</option>	
      					<option value="inactivo" selected>Inactivo</option>	
      				<?php } ?>
      		</select>
      	</div>
      
      	
      	<div class="caja">
      		<button type="submit">Guardar</button>
      	</div>
      </form>
      <div class="more">
      	<a href="#">Imagenes</a>
      	<a href="#">Colores y tallas</a>
      </div>
</div>