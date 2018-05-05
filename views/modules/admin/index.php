<?php
  $num_total_registros = $this->master->selectCount('pedidos','ped_estado','Bodega')[0];
  $num_total_usuarios = $this->master->selectAllCount('usuario')[0];
  $num_total_pro = $this->master->selectAllCount('producto')[0];
?>
<section class="contenido">
  <h1>Bienvenido a la dashboard</h1>
  <div class="table">
    <div class="column">
      <div class="result">
        <span><?php echo $num_total_registros ?></span>
      </div>
      <div class="titleResult">
        <h2><a href="ver-pedidos-hechos">Pedidos</a></h2>
      </div>
    </div>
    <div class="column">
      <div class="result">
        <span><?php echo $num_total_usuarios ?></span>
      </div>
      <div class="titleResult">
        <h2><a href="ver-usuarios-registrados">Usuarios Registrados</a></h2>
      </div>
    </div>
    <div class="column">
      <div class="result">
        <span><?php echo $num_total_pro ?></span>
      </div>
      <div class="titleResult">
        <h2><a href="gestion-producto">total productos registrados</a></h2>
      </div>
    </div>
  </div>
</section>
