<div class="contenido" id="cat-conte">
  <h1>Bienvenido a la gestion de la tienda</h1>
  <?php
if (isset($_SESSION['messagge'])) {
        echo "<div class='message'>".$_SESSION['messagge']."</div>";
        unset($_SESSION['messagge']);
  }
  ?>
  <div class="gestion_ropa">

  <?php
  $result = $this->master->selectAll('categoria');
  foreach ($result as $row) {?>
        <div class="categorias_ropa">
          <a href="ver-categoria-<?php echo $row['cat_codigo']?>"><?php echo $row['cat_categ']; ?></a>
        </div>
    <?php } ?>
        <div class="categorias_ropa" id="add_categoria">
          <span>+</span>
        </div>
  </div>
</div>
