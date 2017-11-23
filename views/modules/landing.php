<?php
$result = $this->master->selectAllLi('categoria');
$pro = $this->master->selectAllLi6('producto');
// print_r($result);
?>
<style>
  #btn_car_compra{
    display: none;
  }
</style>
<section class="home">
  <img src="views/assets/img/IMG_2764.JPG">
  <div class="wrap-frase">
    <!-- <span>siempre en <span class="fra1"> instagram </span> con</span>
    <span class="font">catalina molano</span> -->
    <span>siempre a la <span class="fra1"> moda </span> con</span>
    <span class="font">catalina molano</span>
  </div>
</section>
<section class="categorias-recomendadas">
  <h2>categorias destacadas</h2>
  <div class="contenido-categorias ">
    <?php
    $i = 0;
        foreach ($result as $row) {?>
          <div class="bloque <?php echo 'cat'.$i; ?>">
            <a href="catalogo">
              <?php echo $row['cat_categ']; ?>
            </a>
          </div>

         <?php $i++; }  ?>

</section>
<section class="productos-recomendados">
  <h2>productos sugeridos</h2>
  <div class="contenido-productos">
    <?php
    $i = 0;
        foreach ($pro as $row) {?>
          <div class="bloque <?php echo 'pro'.$i; ?>">
            <a href="catalogo">
              <?php echo $row['pro_nombre']; ?>
            </a>
            <img src="views/assets/img/<?php echo $row['pro_img']; ?>">
          </div>

         <?php $i++; }
    ?>

  </div>
</section>
<!-- <section class="slider-landing">
  <img>
</section>
<section class="landing-seccion2">
  <div class="titulo_seccion_land">
    <h2>categorias destacadas</h2>
  </div>
  <div class="contenido-land">
    <div class="bloque">
      <h2>cat 1</h2>
    </div>
    <div class="bloque">
      <h2>cat 2</h2>
    </div>
    <div class="bloque">
      <h2>cat 3</h2>
    </div>
    <div class="bloque">
      <h2>cat 4</h2>
    </div>
  </div>
</section>
<section class="landing-seccion3">
  <div class="titulo_seccion_land">
    <h2>productos recomendados</h2>
  </div>
  <div class="contenido-land">
    <div class="prod">
      <h2>prod</h2>
    </div>
    <div class="prod">
      <h2>prod</h2>
    </div>
    <div class="prod">
      <h2>prod</h2>
    </div>
  </div>
</section> -->
