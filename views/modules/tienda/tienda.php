    <section>
        <div class="seccion1">
          <div class="slider">
            <div class="wrap--text">
              <h2>TIENDA</h2>
              <h3>Cambia tu estilo con Catalina Molano</h3>
            </div>
          </div>
        </div>
        <div class="seccion2">
    <ul id="gallery" class="gallery ui-helper-reset ">
           <?php
            foreach($consulta as $row){ ?>
                <li class="ui-widget-content">
                      <h5 class="ui-widget-header"><?php echo $row["pro_nombre"]; ?></h5>
                      <img src="views/assets/img/<?php echo $row["pro_img"]; ?>" alt="On top of Kozi kopka" width="96" height="72">
                      <div class="des"><?php echo $row["pro_des"]; ?></div>
                      <span class="dame">Ver</span>
                      <input type="txt" value="<?php echo $row["pro_codigo"]; ?>" class='input-value'>
                     cantidad: <input type="number" value="0" class="input-number-pro <?php echo 'codcant'.$row["pro_codigo"]; ?>" id="<?php echo 'idCan'.$row["pro_codigo"]; ?>">
                     <select id="<?php echo 'idCo'.$row["pro_codigo"]; ?>" class="<?php echo 'idCo'.$row["pro_codigo"]; ?> otra">
                       <option value="blanco">Blanco</option>
                       <option value="rojo">rojo</option>
                     </select>

                     <select id="<?php echo 'idTalla'.$row["pro_codigo"]; ?>" class="<?php echo 'idTalla'.$row["pro_codigo"]; ?> select_tallas" >
                         <option value="m">M</option>
                         <option value="x">X</option>
                     </select>
                     <span id="<?php echo 'otroP'.$row["pro_codigo"]; ?>" class="otroP">Otro </span>
                      <a title="Agregar al carrito" class="fa fa-cart-plus"></a>
                </li>
            <?php } ?>
    </ul>

    <div id="contenedor-objetos" class="ui-widget-content ui-state-default open">
         <h4 class="ui-widget-header"><span class="fa fa-shopping-cart"></span> Carrito de compras</h4>
         <div id="confirm-order">Realizar pedido</div>
    </div>



</div>
      </section>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="views/assets/js/carrito.js"></script>
        <script src="views/assets/js/main.js"></script>
