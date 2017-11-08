    <header>
      <div class="menu--top">
        <div class="wrap--logo">
          <img src="views/assets/img/logo_blanco.png">
        </div>
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
        <div class="slider">
          <div class="wrap--text">
            <h2>TIENDA</h2>
            <h3>Cambia tu estilo con Catalina Molano</h3>
          </div>
        </div>
      </div>
      <div class="seccion2">
        <?php foreach ($consulta as $row) { ?>
        <div class="item">
          <div class="caja--img">
            <div class="h_detalle">
              <i class="fa fa-search" aria-hidden="true"></i>
              <h2>Haz click para ver detalles</h2>
            </div>
            <img src="views/assets/img/<?php echo $row["pro_img"]; ?>">
          </div>
          <div class="descripcion">
            <h2><?php echo $row["pro_nompro"]; ?></h2>
            <article><?php echo $row["pro_des"]; ?></article>
            <div class="descripcion--footer">
              <div class="btn--carrito">
                <button type="button">Añadir al carrito</button>
              </div>
              <div class="btn--mas_menos">
                <button type="button" class="menos">-</button>
                <label>0</label>
                <button type="button" class="mas">+</button>
              </div>
            </div>
          </div>
        </div>
      <?php  } ?>
      </div>
    </section>
