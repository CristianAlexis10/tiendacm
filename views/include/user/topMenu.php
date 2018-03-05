<header>
  <nav class="wrapTopMenu">
    <div class="wrapLogo">
      <div class="logo">
        <div class="ribbon">
          <a href="inicio"><img src="views/assets/img/logo_blanco.png" class="img"></a>
        </div>
      </div>
    </div>
    <ul class="topMenu">
      <div class="itemMenu">
        <div class="dropdown">
          <h2 class="drop">catalogo</h2>
          <div class="dropContent">
            <a href="catalogo">Todos</a>
            <?php foreach ($this->master->selectAll('categoria') as $row ) {  ?>
                <a href="ver-<?php echo str_replace(" ","_",$row['cat_nombre']); ?>"><?php echo $row['cat_nombre'] ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <a href="videos"><li class="itemMenu">Videos</li></a>
      <a href="noticias"><li class="itemMenu">noticias</li></a>
      <li id="modal-login" class="itemMenu">Iniciar Sesion / Registrarse</li>
    </ul>
  </nav>
    <div class="menu--mobile">
      <div class="icon">
          <i class="fa fa-bars" id="menu-res"></i>
      </div>
    </div>
  </div>
</header>
