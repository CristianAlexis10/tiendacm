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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="views/assets/css/style.hola.css">
  <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
  <link rel="stylesheet" type="text/css" href="views/assets/css/style.css">

    <ul id="gallery" class="gallery ui-helper-reset ">
           <?php 
            foreach($consulta as $row){ ?>
                      <h5 class="ui-widget-header"><?php echo $row["pro_nombre"]; ?></h5>
                      <img src="views/assets/img/<?php echo $row["pro_img"]; ?>" alt="On top of Kozi kopka" width="96" height="72">
                     
                      <div class="des"><?php echo $row["pro_des"]; ?></div>
                      <span class="dame">Ver</span>
                      <input type="txt" value="<?php echo $row["pro_codigo"]; ?>" class='input-value'>
                     cantidad: <input type="number" value="0" class="input-number-pro" id="<?php echo 'idCan'.$row["pro_codigo"]; ?>">
                     <select id="<?php echo 'idCo'.$row["pro_codigo"]; ?>">
                       <option value="blanco">Blanco</option>
                       <option value="rojo">rojo</option>
                     </select>
                      <a title="Agregar al carrito" class="fa fa-cart-plus"></a>
                </li>
            <?php } ?>
    </ul>

    <div id="contenedor-objetos" class="ui-widget-content ui-state-default">
         <h4 class="ui-widget-header"><span class="fa fa-shopping-cart"></span> Carrito de compras</h4>
    </div>



</div>
      </section>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="views/assets/js/script.js"></script>
    </section>
    <script src="views/assets/js/main.js"></script>
  </body>
</html>
