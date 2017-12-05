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
      <div class="wrap-img">
        <img src="views/assets/img/products/<?php echo $row['pro_imagen'] ?>" id="<?php echo $row['pro_codigo']?>" alt="" class="wea">
      </div>
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
            <option value="">selecionar talla</option>
          </select>
        </div>
        <div class="color">
          <select class="" name="" id="selectTallasModal">
            <option value="">seleccionar color</option>
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
  <div class="carrito" id="cartCompra">
    <div class="titulo-carrito">
      <span><i class="fa fa-shopping-cart" aria-hidden="true"></i> carrito</span>
    </div>
    <div class="wrap-items-carrito">
      <div class="item-carrito">
        <div class="item-cart-img">
          <img src="views/assets/img/img3.JPEG" alt="">
        </div>
        <div class="info-item-cart">
          <div class="item-cart" id="nombre">
            <h2><span>producto:</span>hola</h2>
          </div>
          <div class="item-cart" id="talla">
            <h2><span>talla:</span>X</h2>
          </div>
          <div class="item-cart" id="color">
            <h2><span>color:</span>red</h2>
          </div>
          <div class="item-cart" id="valor">
            <h2><span>precio:</span>10000</h2>
          </div>
          <div class="item-cart" id="cantidad">
            <h2><span>cantidad:</span>10</h2>
          </div>
        </div>
        <!-- <div class="restar-carrito">
          <h2>-</h2>
        </div> -->
      </div>
    </div>
    <div class="btn-comprar">
      <button type="button" name="button">Hacer compra</button>
    </div>
  </div>
