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
            <?php foreach ($this->master->selectAll('categoria') as $row ) {
              ?>
                <a href="ver-<?php echo str_replace(" ","_",$row['cat_nombre']) ?>"><?php echo $row['cat_nombre'] ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <a href="videos"><li  class="itemMenu">Videos</li></a>
      <a href="noticias"><li  class="itemMenu">Noticias</li></a>
      <li id="btnCarrito" class="itemMenu"><i class="fa fa-shopping-cart" aria-hidden="true"></i></li>
      <a href="mi-perfil"><li class="itemMenu"><?php echo $_SESSION['USER']['NAME']; ?></li></a>
      <a href="finalizar-sesion"><li class="itemMenu"><i class="fas fa-sign-out-alt"></i></li></a>
    </ul>
  </div>
</div>
</header>
