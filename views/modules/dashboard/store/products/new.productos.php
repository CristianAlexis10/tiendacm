<?php
if (isset($_SESSION['messagge'])) {
        echo "<div class='message'>".$_SESSION['messagge']."</div>";
        unset($_SESSION['messagge']);
  }?>
  <div class="contenido">
    <h1>Gestion productos</h1>
    <button type="button" name="button" id="btn-productos" class="btn-productos">Productos</button>
    <div class="wrap-form" id="reg-productos">
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
    <div class="wrap-produ" id="list-productos">
      <table>
        <thead>
            <tr>
                <th>#</th>
                <th>nombre</th>
                <th>precio</th>
                <th>cantidad</th>
                <th>descripcion</th>
                <th>color</th>
                <th>talla</th>
                <th>Acciones/estado</th>
            </tr>
        </thead>
        <tbody>
          <?php $result = $this->master->selectAll('producto');
           foreach ($result as $row) {?>
            <tr>
                <td><?php echo $row['pro_codigo']; ?></td>
                <td><?php echo $row['pro_nombre']; ?></td>
                <td><?php echo $row['pro_precio']; ?></td>
                <td><?php echo $row['pro_cant']; ?></td>
                <td><?php echo $row['pro_des']; ?></td>
                <td>falta</td>
                <td>falta</td>
                <td>
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    <select class="" name="">
                      <option value="">estado</option>
                      <option value="">activo</option>
                      <option value="">inactivo</option>
                    </select>
                </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
