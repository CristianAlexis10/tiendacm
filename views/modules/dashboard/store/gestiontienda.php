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
          <a href="ver-categoria-<?php echo $row['cat_codigo']?>"><?php echo $row['cat_nombre']; ?></a>
        </div>
    <?php } ?>
        <div class="categorias_ropa" id="add_categoria">
          <span>añadir categoria</span>
        </div>
  </div>
</div>
