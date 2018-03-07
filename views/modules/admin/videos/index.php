<div class="contenido" id="cat-conte">
  <h1>Gestion de videos</h1>
  <section class="wrapVideos">

    <?php
    $id = 0;
     foreach ($this->master->selectAll("video") as $row) {
       ?>
    <div class="itemVideo">
      <div class="video">
        <video width="347px" class="videos" muted  id="id<?php echo $id ?>" >
          <source src="views/assets/video/<?php echo $row['url'] ?>" id="hola<?php echo $id ?>" type="video/mp4">
        </video>
      </div>
      <div class="nameVideo">
        <h2><?php echo $row['nombre'] ?></h2>
      </div>
      <div class="btnEdit">
        <i class="far fa-edit"></i>
      </div>
      <div class="btnDelete" id="<?php echo $row['id_video'] ?>">
        <i class="fas fa-trash-alt"></i>
      </div>
      <div class="btnPlay" >
        <i class="fas fa-play play" id="go<?php echo $id ?>"></i>
      </div>
      <div class="btnStop" >
        <i class="fas fa-pause stop " id="stop<?php echo $id?>"></i>
      </div>
      <div class="btnFull" id="fullScreen">
        <i class="fas fa-expand"></i>
      </div>
      <a href="views/assets/img/video/<?php echo $row['url'] ?>" download class="btnDown">
        <div>
          <i class="fas fa-cloud-download-alt"></i>
        </div>
      </a>
    </div>
<?php
$id++;
} ?>

    <div class="itemVideo" id="addVideo">
      <span>añadir video</span>
    </div>
  </section>
  <div class="fondoModalVideo" id="fondoModalVideo"></div>
  <div class="wrapModalVideo" id="wrapModalVideo">
    <div class="modalVideo">

      <form enctype="multipart/form-data" id="formuploadajax" >
        <div class="wrapTitle">
          <h2>Añadir video</h2>
        </div>
        <div class="wrapNameVideo">
          <input type="text" name="nombre" value="" id="cambie_esta_madre" required>
          <label for="cambie_esta_madre">Titulo del video</label>
        </div>
        <div class="wrapFileVideo">
          <div class="upLoad">
            <input type="file" name="archivo1" required>
          </div>
        </div>
        <div class="wrapBtnVideo">
          <button type="submit" name="button">Guardar</button>
          <button type="button" name="button" id="cancelarVideo">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>
