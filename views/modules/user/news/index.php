<section class="seccion1">
  <div class="seccion1">
    <div class="slider">
      <img src="views/assets/img/slider/fondoBlog.jpg" alt="">
      <div class="wrap--text">
        <h2>BLOG</h2>
        <h3>Mantente informado con Catalina Molano</h3>
      </div>
    </div>
  </div>
</section>
<section>
  <?php
  $data =$this->master->selectAll("noticia");
  foreach ($data as $item) {?>
      <div class="wrapNews">
        <div class="new">
          <div class="imgNew">
            <a href="ver-noticia-<?php echo $item['not_codigo']; ?>"><img src="views/assets/img/news/<?php echo $item['not_poster'] ?>" alt=""></a>
          </div>
          <div class="wrapSummaryNew">
            <div class="wrapTitle">
              <a href="ver-noticia-<?php echo $item['not_codigo']; ?>"><h2><?php echo $item['not_titulo']; ?></h2></a>
            </div>
            <div class="wrapSummary">
              <a href="ver-noticia-<?php echo $item['not_codigo']; ?>"><p><?php echo $item['not_preview'] ?></p></a>
            </div>
          </div>
        </div>
      </div>
  <?php  } ?>
</section>
