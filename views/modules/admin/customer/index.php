<div class="slider">
  <div class="wrap--text">
    <h2>TIENDA</h2>
    <h3>Cambia tu estilo con Catalina Molano</h3>
  </div>
</div>
<div class="seccion2">


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
      if (isset($_GET['data'])) {
              $consulta = $this->master->selectAllLimitWhere('producto',$inicio,$elementosPagina,$_GET['data']);
              $num_total_registros = $this->master->selectCount('producto','cat_codigo',$_GET['data']);
      }else{
              $consulta = $this->master->selectAllLimit('producto',$inicio,$elementosPagina);
              $num_total_registros = $this->master->selectAllCount('producto');
      }

      //total paginas
      $total_paginas = ceil($num_total_registros[0]/$elementosPagina);
      if ($pagina>$total_paginas){
          echo "Pagina no disponible";
      }?>
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
          <!-- <button type="button" name="button" class="añadirCarro">añadir al carrito</button> -->
        </div>

      <?php
      }?>
        </div>
        <?php

        if ($total_paginas > 1) {

           if ($pagina != 1){
              echo '<a href="catalogo-'.($pagina-1).'"><i class="fa fa-arrow-left"></i></a>';
           }
              for ($i=1;$i<=$total_paginas;$i++) {
                 if ($pagina == $i){
                    //si muestro el índice de la página actual, no coloco enlace
                    echo $pagina;
                 }else{
                    //si el índice no corresponde con la página mostrada actualmente,
                    echo '  <a href="catalogo-'.$i.'">'.$i.'</a>  ';
                    //coloco el enlace para ir a esa página
                 }
              }
              if ($pagina != $total_paginas){
                 echo '<a href="catalogo-'.($pagina+1).'"><i class="fa fa-arrow-right"></i></a>';
              }
        }
  ?>



  <div class="fondoModal"></div>
  <div class="wrap-modalDetalle">
    <div class="modalDetalle">
      <div class="wrap-image">
        <div class="image">
          <!-- <div class="img-principal"> -->
            <img src="" id="imgModal" alt="">
          <!-- </div>
          <div class="img-extra">

          </div> -->
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
          <span>-</span>
          <span>0</span>
          <span>+</span>
        </div>
        <button type="button" name="button" class="añadirCarro">añadir al carrito</button>
      </div>
    </div>
  </div>

<!-- <div class="wrap-contenido">
  <div class="imagen-perfil">
    <img src="views/assets/img/defaultProfile.PNG" alt="">
  </div>
  <div class="nombre-perfil">
    <label>Yesid "el chango" usuga</label>
  </div>
  <div class="info-perfil">
    <div class="direccion-perfil">
      <label>direccion: <span>barrio antioquia</span></label>
    </div>
    <div class="correo-perfil">
      <label>correo: <span>smokeweedeveryday420@gmail.com</span></label>
    </div>
    <div class="doc-perfil">
      <label>numero documento: <span>1234567890</span></label>
    </div>
    <div class="muni-perfil">
      <label>municipio: <span>medellin</span></label>
    </div>
    <div class="depto-perfil">
      <label>departamento: <span>antioquia</span></label>
    </div>
    <div class="num-perfil">
      <label>telefono: <span>1234567</span></label>
    </div>
  </div>
</div> -->
