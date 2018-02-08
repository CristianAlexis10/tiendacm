<header>
  <div class="wrapTopMenu">
    <div class="wrapLogo">
      <div class="logo">
        <div class="ribbon">
          <a href="inicio"><img src="views/assets/img/logo_blanco.png" class="img"></a>
        </div>
      </div>
    </div>
    <ul class="topMenuLogeado">
      <div class="itemMenu">
        <div class="dropdown">
          <h2 class="drop">catalogo</h2>
          <div class="dropContent">
            <a href="catalogo">Todos</a>
            <?php foreach ($this->master->selectAll('categoria') as $row ) {?>
                <a href="catalogo-<?php echo $row['cat_nombre'] ?>"><?php echo $row['cat_nombre'] ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <a href="videos"><li  class="itemMenu">Videos</li></a>
      <a href="noticias"><li  class="itemMenu">Noticias</li></a>
      <li id="btnCarrito" class="itemMenu"><i class="fa fa-shopping-cart" aria-hidden="true"></i></li>
      <li class="itemMenu"><a href="mi-perfil"><?php echo $_SESSION['USER']['NAME']; ?></a></li>
      <li class="itemMenu"><a href="finalizar-sesion"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
    </ul>
  </div>
</div>
</header>
