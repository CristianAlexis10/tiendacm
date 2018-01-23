<header>
  <div class="menu--top">
    <div class="wrap--logo">
     <a href="cliente"><img src="views/assets/img/logo_blanco.png" class="img"></a>
    </div>
    <ul class="caja--menu">
      <a href="cliente" class="catalogo"><li>Catalogo</li></a>
      <div class="categoria-menu">
        <div class="categorias-items">
          <h2><a href="cliente">Todos</a></h2>
        <?php foreach ($this->master->selectAll('categoria') as $row ) {?>
          <h2><a href="catalogo-<?php echo $row['cat_nombre'] ?>"><?php echo $row['cat_nombre'] ?></a></h2>
        <?php } ?>
        </div>
      </div>
      <a href="videos"><li>Videos</li></a>
      <a href="noticias"><li>Noticias</li></a>
      <a href="#"><li><a href="mi-perfil"><?php echo $_SESSION['USER']['NAME']; ?></a></li></a>
      <li><a href="finalizar-sesion"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      <li id="btnCarrito"><i class="fa fa-shopping-cart" aria-hidden="true"></i></li>
    </ul>
  </div>
</header>
