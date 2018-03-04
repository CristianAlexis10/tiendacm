<div class="contenido" id="cat-conte">
  <h1>Gestion de videos</h1>
  <section class="wrapVideos">
    <?php
     foreach ($this->master->selectAll("video") as $row) {?>
    <div class="itemVideo">
      <div class="video">
        <video width="360px" id="video" muted>
          <source src="views/assets/video/<?php echo $row['url'] ?>" type="video/mp4">
        </video>
      </div>
      <div class="nameVideo">
        <h2><?php echo $row['nombre'] ?></h2>
      </div>
      <div class="btnEdit">
        <i class="far fa-edit"></i>
      </div>
      <div class="btnDelete">
        <i class="fas fa-trash-alt"></i>
      </div>
      <div class="btnPlay" id="play">
        <i class="fas fa-play" id="go"></i><i class="fas fa-pause" id="stop"></i>
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
<?php } ?>

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
