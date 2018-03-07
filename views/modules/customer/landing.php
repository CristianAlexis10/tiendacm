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
          <div class="bloqueC <?php echo 'cat'.$i; ?>">
            <a href="ver-<?php echo str_replace("_"," ",$row['cat_nombre']) ?>" class="categoria-land">
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
</section>
<div class="wrap-items">
    <?php
    $i = 0;
    foreach ($pro as $row) {?>
        <div class="bloqueP <?php echo 'pro'.$i; ?>">
            <div class="item">
                <div class="wrap-img">
                    <img  src="views/assets/img/products/<?php echo $row['pro_imagen'] ?>" id="<?php echo $row['pro_codigo']?>" alt="" class="wea">
                </div>
                <div class="nombre-produc">
                    <h2><?php echo $row['pro_nombre']; ?></h2>
                </div>
                <div class="precio-produc">
                    <h2>$ <?php echo $row['pro_precio']; ?></h2>
                </div>
                <!-- <button type="button" name="button" class="añadirCarro">añadir al carrito</button> -->
            </div>
        </div>

        <?php $i++; }
        ?>
    </div>

  <div class="fondoModal"></div>
  <div class="wrap-modalDetalle">
      <div class="modalDetalle">
          <div class="wrap-image">
              <div class="image">
                  <img src="" id="imgModal" alt="">
              </div>
          </div>
          <div class="wrap-detalle">
              <div class="nombre">
                  <h2 id="nomModal"></h2>
              </div>
              <div class="descripcion">
                  <span id="desModal"></span>
              </div>
              <div class="precio">
                  <span id="preModal">$ </span>
              </div>
              <div class="talla">
                  <select class="" name="" id="selectModal">
                      <option value="">selecionar talla</option>
                  </select>
              </div>
              <div class="color">
                  <select class="" name="" id="selectTallasModal">
                      <option value="">seleccionar color</option>
                  </select>
              </div>
              <div class="cantidad">
                <label for="">cantidad: </label>
                <input type="number" name="" value="" id="cant">
              </div>
              <button type="button" name="button" class="addItemShop">añadir al carrito</button>
          </div>
      </div>
  </div>
