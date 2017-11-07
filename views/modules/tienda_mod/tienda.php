    <header>
      <div class="menu--top">
        <img src="views/assets/img/logo.png">
        <ul class="caja--menu">
          <li>Tienda</li>
          <li>Noticias</li>
          <li>Iniciar Sesion</li>
          <li>Registrarse</li>
        </ul>
      </div>
    </header>
    <section>
      <div class="seccion1">
        <div class="filtro"></div>
        <div class="slider"></div>
      </div>
      <div class="seccion2">
        <?php foreach ($consulta as $row) {
        ?>
        <div class="item">
          <!-- <div class="img"></div> -->
          <img src="views/assets/img/<?php echo $row["pro_img"]; ?>" alt="">
          <div class="descripcion">
            <h2><?php echo $row["pro_nompro"]; ?></h2>
            <article><?php echo $row["pro_des"]; ?></article>
          </div>
        </div>
      <?php  } ?>
      </div>
    </section>
