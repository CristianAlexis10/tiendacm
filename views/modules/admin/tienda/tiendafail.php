    <section>
        <div class="seccion1">
          <div class="slider">
            <div class="wrap--text">
              <h2>TIENDA</h2>
              <h3>Cambia tu estilo con Catalina Molano</h3>
            </div>
          </div>
        </div>
          <br>
          <form method="post">
              <select name="categoria">
                <option value="">seleccionar categoria</option>
                <?php
                  foreach ($this->master->selectAll('categoria') as $row) {
                      if (isset($_SESSION['CATEGORIA'])) {
                          if ($row['cat_codigo']==$_SESSION['CATEGORIA']) {?>
                                <option value="<?php echo $row['cat_codigo']?>" selected ><?php echo $row['cat_nombre']?></option>
                          <?php }else{?>
                                <option value="<?php echo $row['cat_codigo']?>"  ><?php echo $row['cat_nombre']?></option>
                          <?php }
                      }else{?>
                                <option value="<?php echo $row['cat_codigo']?>" ><?php echo $row['cat_nombre']?></option>

                      <?php
                      } } ?>
              </select>
              <input type="submit" value="Enviar" name="submit">
          </form>
        <div class="seccion2">

    <ul>
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
                if (isset($_POST['submit'])) {
                        $_SESSION['CATEGORIA']= $_POST['categoria'];
                        $consulta = $this->master->selectAllLimitWhere('producto',$inicio,$elementosPagina,$_SESSION['CATEGORIA']);
                        $num_total_registros = $this->master->selectCount('producto','cat_codigo',$_SESSION['CATEGORIA']);
                }else{
                        $consulta = $this->master->selectAllLimit('producto',$inicio,$elementosPagina);
                        $num_total_registros = $this->master->selectAllCount('producto');
                }
                //total paginas
                $total_paginas = ceil($num_total_registros[0]/$elementosPagina);
                if ($pagina>$total_paginas){
                    echo "Pagina no disponible";
                }
                foreach ($consulta as $row ) {
                  // echo "<div id='".$row['pro_codigo']."' class='pro'>".$row['pro_nombre']."</div><br>";?>
                    <li>
                      <h5><?php echo $row["pro_nombre"]; ?></h5>
                      <img src="views/assets/img/<?php echo $row["pro_imagen"]; ?>">
                      <div><?php echo $row["pro_des"]; ?></div>
                      <span>Ver</span>
                    </li>

                <?php
                }?>
                  </ul>
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
        </div>
      </section>
