<div class="contenido" id="cat-conte">
  <h1>gestion categorias</h1>
  <?php
if (isset($_SESSION['messagge'])) {
        echo "<span class='message'>".$_SESSION['messagge']."</span>";
        unset($_SESSION['messagge']);
  }
  ?>
  <div class="gestion-categoria">
  <?php
  $result = $this->master->selectAll('categoria');
  foreach ($result as $row) {?>
        <div class="categorias_ropa">
          <div class="nameCat">
            <span ><?php echo $row['cat_nombre']; ?></span>
          </div>
          <div class="deleteCat">
            <!-- <a href="actualizar-categoria-<?php //echo $row['cat_codigo']?>" title="Editar"><i class="far fa-edit"></i></a> -->
            <a title="Editar" class="updateCatBtn"><i class="far fa-edit"></i></a>
          </div>
          <div class="updateCat">
            <a href="eliminar-categoria-<?php echo $row['cat_codigo']?>" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
          </div>
        </div>
    <?php } ?>
        <div class="categorias_ropa" id="add_categoria">
          <span>añadir categoria</span>
        </div>
  </div>
</div>
<!-- modal -->
<div class="background" id="background"></div>
<div class="wrapModalCategory" id="reg_categoria">
    <div class="modalCategory">
        <div class="modalCategoryTitle">
          <h2>Añadir categoria</h2>
        </div>
        <form id="frmNewCat" class="modalCategoryForm">
          <div class="frmCategoryName">
            <label for="name">categoria: </label>
            <input type="text" id="name" placeholder="Nombre categoria">
          </div>
          <div class="frmCategoryImg">
           <div id="wrap-result"><img src="views/assets/img/defaultProfile.png" ></div>
           <h2 class="" id="cropp-img">Cambiar foto</h2>
          </div>
        <button type="submit">guardar</button>
        <button type="button" id="modalCategoryCancel">cancelar</button>
      </form>
    </div>
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
  <div class="modalUpdateCategory">
    <div class="wrapUpdateCategory">
      <form id="frmUpdateCat" class="frmUpdateCat">
          <div class="frm-group">
            <h3>Actualizar producto</h3>
          </div>
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
      		<div class="frm-group Cambiar--img">
      			<div id="wrap-result"><img src="views/assets/img/category/<?php echo $result['cat_img'] ?>" ></div>
      			<h2 class="" id="cropp-img">Cambiar foto</h2>
      		</div>
      	<input type="submit" value="Guardar" class="modalUpdateCategoryBtn">
      	<input type="button" value="Cancelar" class="modalUpdateCategoryBtnC">
      </form>
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
    </div>
  </div>
