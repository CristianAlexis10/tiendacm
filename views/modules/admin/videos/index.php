<div class="contenido" id="cat-conte">
  <h1>Gestion de videos</h1>
  <section class="wrapVideos">
    <div class="itemVideo">
      <div class="video">
        <video width="360px" id="video" muted>
          <source src="views/assets/img/videos/thresh.mp4" type="video/mp4">
        </video>
      </div>
      <div class="nameVideo">
        <h2>aqui va el titulo del video</h2>
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
      <a href="views/assets/img/videos/thresh.mp4" download class="btnDown">
        <div>
          <i class="fas fa-cloud-download-alt"></i>
        </div>
      </a>
    </div>
    <div class="itemVideo" id="addVideo">
      <span>añadir video</span>
    </div>
  </section>
  <div class="fondoModalVideo" id="fondoModalVideo"></div>
  <div class="wrapModalVideo" id="wrapModalVideo">
    <div class="modalVideo">
      <form class="" action="subir_video" method="post" enctype="multipart/form-data">
        <div class="wrapTitle">
          <h2>Añadir video</h2>
        </div>
        <div class="wrapNameVideo">
          <input type="text" name="" value="" id="cambie_esta_madre" required>
          <label for="cambie_esta_madre">Titulo del video</label>
        </div>
        <div class="wrapFileVideo">
          <div class="upLoad">
            <input type="file" required>
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
