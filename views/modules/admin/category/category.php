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
            <a href="actualizar-categoria-<?php echo $row['cat_codigo']?>" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          </div>
          <div class="updateCat">
            <a href="eliminar-categoria-<?php echo $row['cat_codigo']?>" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
        </div>
    <?php } ?>
        <div class="categorias_ropa" id="add_categoria">
          <span>añadir categoria</span>
        </div>
  </div>
</div>
<!-- modal -->
<div class="fondo" id="fondo"></div>
<div class="wrapRegCat">
    <div class="reg_categoria" id="reg_categoria">
      <div class="wrapGrid">
        <div class="">
          <h2>Añadir categoria</h2>
        </div>
          <form id="frmNewCat">
            <div class="frm-form">
              <label for="name">categoria: </label>
              <input type="text" id="name" placeholder="Nombre categoria">
            </div>
            <div class="">
              <div class="form-group Cambiar--img">
               <div id="wrap-result"><img src="views/assets/img/defaultProfile.png" ></div>
               <span class="" id="cropp-img">Cambiar foto</span>
             </div>
            </div>
          <button type="submit">guardar</button>
        </form>
      </div>
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
