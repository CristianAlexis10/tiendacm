<div class="slider">
  <div class="wrap--text">
    <h2>TIENDA</h2>
    <h3>Cambia tu estilo con Catalina Molano</h3>
  </div>
</div>
<div class="seccion2">
  <div class="wrap-items">
    <?php $result = $this->master->selectAll('producto');
    foreach ($result as $row) { ?>
    <div class="item">
        <!-- <img src="views/assets/img/products/<?php //echo $row['pro_imagen']; ?>" alt=""> -->
        <img src="views/assets/img/IMG_2737.JPG" alt="" class="wea">
      <div class="nombre-produc">
        <h2><?php echo $row['pro_nombre']; ?></h2>
      </div>
      <div class="precio-produc">
        <h2><?php echo $row['pro_precio']; ?></h2>
      </div>
      <button type="button" name="button">añadir al carrito</button>
    </div>
    <?php } ?>
  </div>
  <div class="fondoModal"></div>
  <div class="wrap-modalDetalle">
    <div class="modalDetalle">
      <div class="wrap-image">
        <div class="image">
          <img src="views/assets/img/products/<?php echo $row['pro_imagen']; ?>" alt="">
        </div>
      </div>
      <div class="wrap-detalle">
        <div class="nombre">
          <h2><?php echo $row['pro_nombre']; ?></h2>
        </div>
        <div class="descripcion">
          <span><?php echo $row['pro_des']; ?></span>
        </div>
        <div class="precio">
          <span><?php echo $row['pro_precio']; ?></span>
        </div>
        <div class="talla">
          <select class="" name="">
            <option value="">selecciona color</option>
            <option value="">azul</option>
            <option value="">rojo</option>
          </select>
        </div>
        <div class="color">
          <select class="" name="">
            <option value="">selecciona talla</option>
            <option value="">X</option>
            <option value="">L</option>
          </select>
        </div>
        <div class="cantidad">
          <span>-</span>
          <span>0</span>
          <span>+</span>
        </div>
        <button type="button" name="button">añadir al carrito</button>
      </div>
    </div>
  </div>
