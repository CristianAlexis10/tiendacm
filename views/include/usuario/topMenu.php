<header>
  <div class="menu--top">
    <div class="wrap--logo">
     <a href="landing"><img src="views/assets/img/logo_blanco.png" class="img"></a>
    </div>
    <div class="wrap-cajaMenu" id="caja--menu">
        <ul class="caja--menu">
          <a href="catalogo" class="catalogo"><li>Catalogo</li></a>
          <div class="categoria-menu">
            <div class="categorias-items">
              <h2><a href="cliente">Todos</a></h2>
            <?php foreach ($this->master->selectAll('categoria') as $row ) {?>
              <h2><a href="catalogo--<?php echo $row['cat_codigo'] ?>"><?php echo $row['cat_nombre'] ?></a></h2>
            <?php } ?>
            </div>
          </div>
          <!-- <a href="#"><li>Videos</li></a> -->
          <a href="videos"><li>Videos</li></a>
          <!-- <a href="#"><li>Noticias</li></a> -->
          <a href="noticias"><li>Noticias</li></a>
          <li id="modal-login">Iniciar Sesion / Registrarse</li>
        </ul>
      </div>
    <div class="menu--mobile">
      <div class="icon">
          <i class="fa fa-bars" id="menu-res"></i>
      </div>
    </div>
  </div>
</header>
