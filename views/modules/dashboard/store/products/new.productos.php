<?php
if (isset($_SESSION['messagge'])) {
        echo "<div class='message'>".$_SESSION['messagge']."</div>";
        unset($_SESSION['messagge']);
  }?>
  <div class="contenido">
    <h1>Gestion productos</h1>
    <div class="wrap-form">
      <form class="form-producto" action="guardar-producto" method="post" enctype="multipart/form-data">
      	<div class="caja">
          <label for="">nombre: </label>
      		<input type="text" name="data[]" required>
      	</div>
      	<div class="caja">
          <label for="">precio: </label>
      		<input type="text" name="data[]" required>
      	</div>
      	<div class="caja">
          <label for="">cantidad: </label>
      		<input type="number" name="data[]" required>
      	</div>
      	<div class="caja">
          <label for="">descripción: </label>
      		<input type="text" name="data[]" required>
      	</div>
      	<div class="caja">
          <label for="">categoria: </label>
      		<select required name="data[]">
            <option value="">seleccionar categoria</option>
      			<?php
      				foreach ($this->master->selectAll('categoria') as $row) {?>
      					<option value="<?php echo $row['cat_codigo']?>"><?php echo $row['cat_nombre'] ?></option>
      				<?php
      				}
      			?>
      		</select>
      	</div>
      	<div class="caja">
          <label for="">imagen: </label>
      		<input type="file" name="file">
      	</div>
      	<div class="caja">
      		<button type="submit">Registrar</button>
      	</div>
      </form>
    </div>
  </div>
</div>
