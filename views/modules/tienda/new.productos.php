<?php
if (isset($_SESSION['messagge'])) {
        echo "<div class='message'>".$_SESSION['messagge']."</div>";
        unset($_SESSION['messagge']);
  }
  ?>

<form action="guardar-producto" method="post" enctype="multipart/form-data">
	<div class="frm">
		Referencia: <input type="text" name="data[]" required>
		
	</div>
	<div class="frm">
		Precio: <input type="text" name="data[]" required>
		
	</div>
	<div class="frm">
		Cantidad: <input type="number" name="data[]" required>
		
	</div>
	<div class="frm">
		Descripción: <input type="text" name="data[]" required>
		
	</div>
	<div class="frm">
		Categoria:<select required name="data[]">
			<?php
				foreach ($this->master->selectAll('categoria') as $row) {?>
					<option value="<?php echo $row['cat_codigo']?>"><?php echo $row['cat_categ'] ?></option>
				<?php 
				}
			?>
		</select>
		
	</div>
	<div>
		Imagen:<input type="file" name="file">
	</div>
	<div>
		<input type="submit" value="Registrar">
	</div>
</form>