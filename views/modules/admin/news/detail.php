<section class="contenido" id="cat-conte">
  <div id="NOTICIA">
      <?php
        $data=$this->master->selectAllBy("estructura_noticia",array("not_codigo",$_GET['data']));
        foreach ($data as $item ) {
            if ($item['tipo']=="titulo") {
                  echo "<h2 class='noticia-titulo'>".$item['title']."</h2>";
            }elseif($item['tipo']=="parrafo"){
                echo "<p class='noticia-parrafo'>".$item['parrafo1']."</p>";
            }elseif($item['tipo']=="parrafo2"){
                echo "<div class='container-parrafo'><p class='parrafo-izq'>".$item['parrafo1']."</p><p class='parrafo-der'>".$item['parrafo2']."</p></div>";
            }elseif($item['tipo']=="img"){
              echo "<div class='noticia-img'><img class='img-no' src='views/assets/img/news/".$item['img']."'></div>" ;
            }
        }
      ?>
  </div>
