<div class="refresh"></div>
<div class="carrito" id="cartCompra">
  <div class="titulo-carrito">
    <span><i class="fa fa-shopping-cart" aria-hidden="true"></i> carrito</span>
  </div>
  <div class="wrap-items-carrito">
    <?php
      // $_SESSION['cart_item'][]=array("producto"=>"nada","cantidad"=>111,"precio"=>121,"color"=>"azul","talla"=>"X");
      // $_SESSION['cart_item'][]=array("producto"=>"nada","cantidad"=>111,"precio"=>121,"color"=>"azul","talla"=>"X");
      // $_SESSION['cart_item'][]=array("producto"=>"nada","cantidad"=>111,"precio"=>121,"color"=>"azul","talla"=>"X");
      $indice =0;
      if (isset($_SESSION['cart_item'])) {
      foreach ($_SESSION['cart_item'] as $item) {?>
            <div class="item-carrito" id="<?php echo $indice; ?>">
              <div class="item-cart-img">
                <img src="views/assets/img/products/<?php echo $item['image'] ?>" alt="">
              </div>
              <div class="info-item-cart">
                <div class="item-cart" id="nombre">
                  <h2><span>producto:</span><?php echo $item['producto']; ?></h2>
                </div>
                <div class="item-cart" id="cantidad">
                  <h2><span>cantidad:</span><?php echo $item['cantidad']; ?></h2>
                </div>
                <div class="item-cart" id="valor">
                  <h2><span>precio:</span><?php echo $item['precio']; ?></h2>
                </div>
              </div>
              <div class="info-item-cart">
                <div class="item-cart" id="color">
                  <h2><span>color:</span><?php echo $item['color']; ?></h2>
                </div>
                <div class="item-cart" id="talla">
                  <h2><span>talla:</span><?php echo $item['talla']; ?></h2>
                </div>
                <div class="item-cart">
                  <button type="button" name="button" class="<?php echo $indice ; ?> restar-carrito"><i class="fa fa-times-circle" aria-hidden="true"></i>  eliminar</button>
                </div>
              </div>
            </div>

      <?php
      $indice++;
    }
  }
      // unset($_SESSION['cart_item']);
    ?>
  </div>
  <div class="btn-comprar">
    <button type="button" name="button">Hacer compra</button>
  </div>
</div>
