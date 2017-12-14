<header>
  <div class="menu--top">
    <div class="wrap--logo">
     <a href="landing"><img src="views/assets/img/logo_blanco.png"></a>
    </div>
    <ul class="caja--menu">
      <a href="cliente" class="catalogo"><li>Catalogo</li></a>
      <div class="categoria-menu">
        <div class="categorias-items">
        <?php foreach ($this->master->selectAll('categoria') as $row ) {?>
          <h1><a href="catalogo--<?php echo $row['cat_codigo'] ?>"><?php echo $row['cat_nombre'] ?></a></h1>
        <?php } ?>
        <h1><a href="cliente">Todos</a></h1>
        </div>
      </div>
      <a href="videos"><li>Videos</li></a>
      <a href="noticias"><li>Noticias</li></a>
      <a href="#"><li><?php echo $_SESSION['USER']['NAME'] ?></li></a>
      <li><i class="fa fa-sign-out" aria-hidden="true"></i></li>
      <li id="btnCarrito"><i class="fa fa-shopping-cart" aria-hidden="true"></i></li>
    </ul>
  </div>
</header>
