
<section class="contenido" id="cat-conte">
  <h1>Gestion del blog</h1>
  <div class="wrapNewsGrid">

    <?php
        $data = $this->master->selectAll("noticia");
      ?>
      <?php foreach ($data as $row) { ?>
        <div class="itemNews">
          <div class="newsTitle">
            <h2><?php echo $row['not_titulo']?></h2>
          </div>
          <div class="newsImg">
            <div class="wrapImg">
              <img src="views/assets/img/news/<?php echo $row['not_poster']?>" alt="">
            </div>
          </div>
          <div class="newsDesc">
            <div class="text">
                <?php echo $row['not_preview']?>
            </div>
          </div>
          <div class="newsBtn">
            <div class="newsEdit" id="E<?php echo $row['not_codigo']?>">
              <i class="far fa-edit"></i>
            </div>
            <div class="newsDelete" id="<?php echo $row['not_codigo']?>">
              <i class="fas fa-trash-alt"></i>
            </div>
          </div>
        </div>
      <?php  }?>

    <div class="itemNews">
      <div class="newsTitle" id="newEntry">
        <h2>añadir entrada</h2>
      </div>
    </div>
  </div>
  <div class="backgroundModalBlog" id="modalNewEntry">
    <form class="modalBlog" id="registrarNew">
            <div class="newNew">
              <label for="title">Titulo:<span class="obligatorio">*</span></label>
              <input type="text" class="input" id="title" required>
            </div>
            <div class="newNew">
                <label for="des">Resumen:<span class="obligatorio">*</span></label>
                <textarea name="name" rows="8" cols="65" id="preview" required placeholder="Ingresa un pequeño resumen sobre lo  que tratara este blog"></textarea>
            </div>
            <div class="form-group Cambiar--img">
               <div id="wrap-result"><img src="views/assets/img/defaultProfile.png" ></div>
               <div class="wrapBtnImg">
                 <h3 class="btnImg" id="cropp-img">Foto de vista previa<span class="obligatorio">*</span></h3>
               </div>
           </div>
           <input type="hidden" id="img" value="default" disabled>
           <input type="submit"  value="Continuar">
            <button type="button" name="button" id="closeNewEntry">cancelar</button>
    </form>
  </div>


  <div class="backgroundModalBlog" id="editEntry1">
    <form class="modalBlog" id="uptadeNews">
          <div class="newNew">
            <label for="title">Titulo:<span class="obligatorio">*</span></label>
            <input type="text" class="input" id="titleEdi" required>
          </div>
          <div class="newNew">
              <label for="des">Resumen:<span class="obligatorio">*</span></label>
              <textarea name="name" rows="8" cols="65" id="previewEdit" required placeholder="Ingresa un pequeño resumen sobre lo  que tratara este blog"></textarea>
          </div>
          <div class="form-group Cambiar--img">
             <div id="wrap-result2"><img  id="imgVal" ></div>
             <div class="wrapBtnImg">
               <h3 class="btnImg" id="cropp-img2">Foto de vista previa<span class="obligatorio">*</span></h3>
             </div>
         </div>
         <input type="hidden" id="img2" value="default" disabled>
         <input type="submit"  value="Editar">
      <button type="button" name="button" id="closeEntry1">cancelar</button>
    </form>
  </div>
</section>


<div id="img-product">
    <div class="newMark--img">
      <span id="closeImg">&times;</span>
      <div id="uploadImage">
        <div id="wrap-upload" style="width:300px"></div>
        <input type="file" id="upload">
        <button class="btn btn-success upload-result">Recortar Imagen</button>
      </div>
    </div>
  </div>
<div id="img-product2">
    <div class="newMark--img">
      <span id="closeImg2">&times;</span>
      <div id="uploadImage2">
        <div id="wrap-upload2" style="width:300px"></div>
        <input type="file" id="upload2">
        <button class="btn btn-success upload-result2">Recortar Imagen</button>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  <script src="views/assets/js/croppie.js"></script>
  <script src="views/assets/js/cropp-news.js"></script>
   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="views/assets/js/main-admin.js"> </script>
  <script src="views/assets/js/shortcut.js"></script>
  <script src="views/assets/js/security.js"></script>
</section>
</body>
</html>
