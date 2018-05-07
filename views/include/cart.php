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
        $totalPedido =0 ;
      foreach ($_SESSION['cart_item'] as $item) {
        $totalPedido = $totalPedido+$item['precio'];
        ?>
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
                <?php if($item['cantidad']>=10){?>
                  <div class="item-cart" id="valor">
                    <h2><span>precio(Por mayor):</span><?php echo number_format($item['precio']); ?></h2>
                  </div>
                <?php }else{?>
                <div class="item-cart" id="valor">
                  <h2><span>precio:</span><?php echo number_format($item['precio']); ?></h2>
                </div>
                <?php }?>
              </div>
              <div class="info-item-cart">
                <div class="item-cart" id="color">
                  <h2><span>color:</span><?php echo $item['color']; ?></h2>
                </div>
                <div class="item-cart" id="talla">
                  <h2><span>talla:</span><?php echo $item['talla']; ?></h2>
                </div>
                <div class="item-cart">
                  <button type="button" name="button" class="restar-carrito" onclick="eliminarItem(<?php echo $indice ; ?>)"><i class="fa fa-times-circle" aria-hidden="true"></i>  eliminar</button>
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
    <button type="button" name="button" id="btnCartCompra" onclick="datosEnvio()">Hacer compra (<?php echo number_format($totalPedido); ?>)</button>
  </div>
</div>
<div class="fondoModalCart" id="fondoModalCart"></div>
<div class="wrapModal" id="wrapCart">
  <div class="modalCart">
    <form  id="confirmOrder" class="formCart">
      <?php
        $data = $this->master->selectBy("usuario",array("usu_codigo",$_SESSION['USER']['CODE']));
        if($data['usu_dir']=="0"){ ?>
          <div class="frm-group">
            <label for="ciudad">Ciudad: </label>
            <select  id="ciudad">
              <?php foreach ($this->master->selectAll("municipio") as $row) {?>
              <option value="<?php echo $row['mun_codigo']?>"><?php echo $row['mun_nombre']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="frm-group">
            <label for="dir">Dirección de envio: </label>
            <input type="text" id="dir" placeholder="Ingresa la dirección" required>
          </div>
          <div class="frm-group">
            <label for="cel">Numero de celular:</label>
            <input type="number" required id="cel" placeholder="Numero de celular"  onkeypress="return valida(event)">
          </div>
          <div class="frm-group">
            <label for="fecha">Fecha de entrega:</label>
            <input type="date"  class="fecha" placeholder="Ingresa la fecha de entrega" required>
          </div>
          <div class="frm-group">
            <button type="button" name="button" onclick="RealizarPedido()">Confirmar</button>
            <button type="button" name="button" onclick="datosEnvio()">Cerrar</button>
          </div>
        <?php
      }else{?>
        <div class="frm-group">
          <label for="ciudad">Ciudad: </label>
          <select  id="ciudad">
            <?php foreach ($this->master->selectAll("municipio") as $row) {
                if ($data['mun_codigo']==$row['mun_codigo']) {?>
                    <option value="<?php echo $row['mun_codigo']?>" selected><?php echo $row['mun_nombre']?></option>
                <?php }else{  ?>
            <option value="<?php echo $row['mun_codigo']?>"><?php echo $row['mun_nombre']?></option>
          <?php } } ?>
          </select>
        </div>
        <div class="frm-group">
          <label for="dir">Dirección de envio: </label>
          <input type="text" id="dir" value="<?php echo $data['usu_dir']?>" required>
        </div>
        <div class="frm-group">
          <label for="cel">Numero de celular:</label>
          <input type="number" required id="cel" value="<?php echo $data['usu_telefono']?>"  onkeypress="return eliminarLetras(event)">
        </div>
        <div class="frm-group">
          <label id="fecha">Fecha de entrega:</label>
          <input type="date" required class="fecha">
        </div>
        <div class="frm-group">
          <button type="button" name="button" onclick="RealizarPedido()">Confirmar</button>
          <button type="button" name="button" onclick="datosEnvio()">Cerrar</button>
        </div>
        <?php } ?>
    </form>
  </div>
</div>
