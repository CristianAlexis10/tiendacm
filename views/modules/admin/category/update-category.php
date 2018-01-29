<?php
$result = $this->master->selectBy('categoria',array('cat_codigo',$data));
$_SESSION['cat_mod']=$result['cat_codigo'];
?>
<div class="contenido" id="cat-conte">
<form id="frmUpdateCat">
		<div class="frm-group">
				<label for="name">Nombre:</label>
				<input type="text" id="name" value="<?php echo $result['cat_nombre'] ?>" required>
		</div>
		<div class="frm-group">
				<label for="status">Estado:</label>
						<select id="status" required>
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
		</div>

		<div class="">
			<div class="form-group Cambiar--img">
				<div id="wrap-result"><img src="views/assets/img/category/<?php echo $result['cat_img'] ?>" ></div>
				<span class="" id="cropp-img">Cambiar foto</span>
			</div>
		</div>

	<input type="submit" value="Actualizar">
</form>

</div>
<div id="img-product">
    <div class="newMark--img">
      <span id="closeImg">&times;</span>
      <div id="uploadImage">
        <div id="wrap-upload" style="width:300px"></div>
        <input type="file" id="upload">
        <button class="btn btn-success upload-result">Recortar Imagen</button>
      </div>
    </div>
  </div>
