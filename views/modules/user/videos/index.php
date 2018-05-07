<div class="slider">
  <img src="views/assets/img/slider/fondoVideos.jpg" alt="">
  <div class="wrap--text">
    <h2>VIDEOS</h2>
    <h3>Mira los ultimos videos con Catalina Molano</h3>
  </div>
</div>
<section class="wrapVideos">
  <?php
    $elementosPagina = 4;
    if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];
        $inicio = ($pagina - 1) * $elementosPagina;
    }else{
        $inicio = 0;
        $pagina = 1;
    }
    $consulta = $this->master->procedure->PRByAll("paginasVideos",array($inicio,$elementosPagina));
    $num_total_registros = $this->master->selectAllCount('video')[0];
    if ($num_total_registros==0) {
       echo "No hay resultados";
     }else{
        //total pagina
         $total_paginas = ceil($num_total_registros/$elementosPagina);
         if ($pagina>$total_paginas && $num_total_registros!=0){
             echo "Pagina no disponible";
         }else{
  foreach ($consulta as $row) { ?>
    <div class="videos">
      <div class="itemsVideos watchVideo">
        <div class="video">
          <video width="360px" muted>
            <source src="views/assets/video/<?php echo $row['url'] ?>" type="video/mp4">
          </video>
        </div>
        <div class="videoTitulo">
          <h2><?php echo $row['nombre'] ?></h2>
        </div>
      </div>
    </div>
<?php } } } ?>

<div class="backgroundVideo" id="backgroundVideo"></div>
<div class="wrapPlayVideo" id="wrapPlayVideo">
  <video width="1000px" controls id="pauseVideo" class="pauseVideo">
    <source src="views/assets/video/<?php echo $row['url'] ?>" type="video/mp4" id="srcVideo">
  </video>
</div>
</section>

<div class="wrapPaginas">
  <div class="paginas">
    <?php
    if ($total_paginas > 1) {
      if ($pagina != 1){
        echo '<a href="videos-'.($pagina-1).'"><i class="fa fa-arrow-left"></i></a>';
      }
      for ($i=1;$i<=$total_paginas;$i++) {
        if ($pagina == $i){
          echo '<span>'.$pagina.'</span>';
        }else{
          echo '  <a href="videos-'.$i.'">'.$i.'</a>  ';
        }
      }
      if ($pagina != $total_paginas){
        echo '<a href="videos-'.($pagina+1).'"><i class="fa fa-arrow-right"></i></a>';
      }
    }
    ?>
  </div>
</div>
