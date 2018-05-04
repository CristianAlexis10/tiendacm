<div class="slider">
  <div class="wrap--text">
    <h2>TIENDA</h2>
    <h3>Cambia tu estilo con Catalina Molano</h3>
  </div>
</div>
<div class="contenido">
  <?php
       //total de elementos por cada pagina
      $elementosPagina = 12;
      //saber si existe la pagina
      if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];
         $inicio = ($pagina - 1) * $elementosPagina;
      }else{
         $inicio = 0;
         $pagina = 1;
      }
      if (isset($_GET['categoria'])) {
          $consulta = $this->master->procedure->PRByAll("productosBycategoria",array($_GET['categoria']));
          $categoria = $this->master->selectBy("categoria",array("cat_nombre",$_GET['categoria']));
          $num_total_registros = $this->master->selectCount('producto','cat_codigo',$_GET['categoria'])[0];
      }else{
          $consulta = $this->master->procedure->PRByAll("paginasTodosProductos",array($inicio,$elementosPagina));
          $num_total_registros = $this->master->selectAllCount('producto')[0];
      }

      if ($num_total_registros==0) {
         echo "No hay resultados";
     }else{
         //total paginas
         $total_paginas = ceil($num_total_registros/$elementosPagina);
         if ($pagina>$total_paginas && $num_total_registros!=0){
             echo "Pagina no disponible";
         }else{?>
             <div class="wrap-items">
                 <?php
                 foreach ($consulta as $row ) {?>
                     <div class="item">
                         <div class="wrap-img">
                             <img src="views/assets/img/products/<?php echo $row['pro_imagen'] ?>" id="<?php echo $row['pro_codigo']?>" alt="" class="wea">
                         </div>
                         <div class="nombre-produc">
                             <h2><?php echo $row['pro_nombre']; ?></h2>
                         </div>
                         <div class="precio-produc">
                             <h2>$ <?php echo $row['pro_precio']; ?></h2>
                         </div>
                         <button type="button" name="button" class="wea " id="<?php echo $row['pro_codigo']?>">añadir al carrito</button>
                     </div>

                     <?php
                 }?>
             </div>
             <div class="wrapPaginas">
             <div class="paginas">
             <?php
             if ($total_paginas > 1) {
                 if ($pagina != 1){
                     echo '<a href="catalogo-pag-'.($pagina-1).'"><i class="fa fa-arrow-left"></i></a>';
                 }
                 for ($i=1;$i<=$total_paginas;$i++) {
                     if ($pagina == $i){
                         //si muestro el índice de la página actual, no coloco enlace
                         echo '<span>'.$pagina.'</span>';
                     }else{
                         //si el índice no corresponde con la página mostrada actualmente,
                         echo '  <a href="catalogo-pag-'.$i.'">'.$i.'</a>  ';
                         //coloco el enlace para ir a esa página
                     }
                 }
                 if ($pagina != $total_paginas){
                     echo '<a href="catalogo-pag-'.($pagina+1).'"><i class="fa fa-arrow-right"></i></a>';
                 }
             }
             ?>
             </div>
             </div>
         </div>
         <div class="fondoModal"></div>
         <div class="wrap-modalDetalle">
             <div class="modalDetalle">
               <div class="wrap-image">
                   <div class="image">
                     <img class="mySlides" src="" id="imgModal" alt="">
                   </div>
                   <div class="btnImg">
                    <button class="left" onclick="plusDivs(-1)"><i class="fas fa-angle-left"></i></button>
                    <button class="right" onclick="plusDivs(1)"><i class="fas fa-angle-right"></i></button>
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
                       <span>color: </span>
                         <select class="" name="" id="selectModal">
                             <option value="">selecionar talla</option>
                         </select>
                     </div>
                     <div class="color">
                       <span>talla: </span>
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
     <?php }
        }
  ?>
