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
            <a href="actualizar-categoria-<?php echo $_GET['data']?>" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
          </div>
          <div class="updateCat">
            <a href="eliminar-categoria-<?php echo $_GET['data']?>" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
        </div>
    <?php } ?>
        <div class="categorias_ropa" id="add_categoria">
          <span>añadir categoria</span>
        </div>
  </div>
</div>
