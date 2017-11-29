  <div class="contenido">
  	<form id="frmCT">
  		<p class="frm-title">Seleccione los colores disponibles:</p> 
  		<div class="frm-group">
		         <?php
		                  foreach ($this->master->selectAll("color") AS $row) {?>
		                          <label><?php echo $row['col_color'] ?>
		                            <input type="checkbox"  name="color" value="<?php echo $row['col_codigo']?>"  >
		                          </label>
		                  <?php }  ?>
        		</div>

        		<p class="frm-title">Seleccione las tallas disponibles:</p> 
  		<div class="frm-group">
		         <?php
		                  foreach ($this->master->selectAll("talla") AS $row) {?>
		                          <label><?php echo $row['tal_talla'] ?>
		                            <input type="checkbox"  name="talla" value="<?php echo $row['tal_codigo']?>"  >
		                          </label>
		                  <?php }  ?>
        		</div>

        		<div class="frm-group">
        			<button type="submit">Registar</button>
        		</div>
  	</form>
  	<?php 
		// echo $_SESSION['producto'];
	?>
 </div>