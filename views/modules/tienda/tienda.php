<div class="slider">
  <div class="wrap--text">
    <h2>TIENDA</h2>
    <h3>Cambia tu estilo con Catalina Molano</h3>
  </div>
</div>
<div class="seccion2">
  <div class="wrap-items">
    <?php $result = $this->master->selectAll('producto');
    foreach ($result as $row) {
      ?>
    <div class="item">
        <img src="views/assets/img/products/<?php echo $row['pro_imagen'] ?>" id="<?php echo $row['pro_codigo']?>" alt="" class="wea">
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
          <span id="preModal"></span>
        </div>
        <div class="talla">
          <select class="" name="" id="selectModal">

          </select>
        </div>
        <div class="color">
          <select class="" name="" id="selectTallasModal">          </select>
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
  <div class="carrito">
    <div class="titulo-carrito">
      <span><i class="fa fa-shopping-cart" aria-hidden="true"></i> carrito</span>
    </div>
    <div class="items-carrito">
      <div class="">

      </div>
    </div>
    <div class="btn-comprar">
      <button type="button" name="button">Hacer compra</button>
    </div>
  </div>
