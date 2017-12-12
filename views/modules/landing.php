<?php
$result = $this->master->selectAllLi('categoria');
$pro = $this->master->selectAllLi6('producto');
// print_r($result);
?>
<section class="home">
  <img src="views/assets/img/IMG_2764.JPG">
  <div class="wrap-frase">
    <!-- <span>siempre en <span class="fra1"> instagram </span> con</span>
    <span class="font">catalina molano</span> -->
    <span>siempre a la <span class="fra1"> moda </span> con</span>
    <span class="font">catalina molano</span>
  </div>
</section>
<section class="categorias-recomendadas">
  <h2>categorias destacadas</h2>
  <div class="contenido-categorias ">
    <?php
    $i = 0;
        foreach ($result as $row) {?>
          <div class="bloque <?php echo 'cat'.$i; ?>">
            <a href="catalogo" class="categoria-land">
              <div class="wrap-imagen">
                <img src="views/assets/img/category/<?php echo $row['cat_img'];?>">
              </div>
              <div class="wrap-text">
                <label for=""><?php echo $row['cat_nombre']; ?></label>
              </div>
            </a>
          </div>

         <?php $i++; }  ?>

</section>
<section class="productos-recomendados">
  <h2>productos sugeridos</h2>
  <div class="contenido-productos">
    <?php
    $i = 0;
        foreach ($pro as $row) {?>
          <div class="bloque <?php echo 'pro'.$i; ?>">
            <a href="catalogo" class="producto-land">
              <div class="wrap-imagen">
                <img src="views/assets/img/products/<?php echo $row['pro_imagen']; ?>">
              </div>
              <div class="wrap-text">
                <label for=""><?php echo $row['pro_nombre']; ?></label>
              </div>
            </a>
          </div>

         <?php $i++; }
    ?>

  </div>
</section>
