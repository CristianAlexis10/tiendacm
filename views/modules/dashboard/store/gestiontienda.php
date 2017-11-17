<div class="contenido">
  <h1>Bienvenido a la gestion de la tienda</h1>
  <div class="gestion_ropa">
  <?php
  $result = $this->master->selectAll('categoria');
  foreach ($result as $row) {?>
        <div class="categorias_ropa">
          <a href="#"><?php echo $row['cat_categ']; ?></a>
        </div>
    <?php } ?>
        <div class="categorias_ropa" id="add_categoria">
          <span>+</span>
        </div>
  </div>
</div>
