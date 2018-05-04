
<section class="contenido" id="cat-conte">
  <h1>Gestion del blog</h1>
  <div class="wrapNewsGrid">
    <div class="itemNews">
      <div class="newsTitle">
        <h2>vamos a ver que sale</h2>
      </div>
      <div class="newsImg">
        <div class="wrapImg">
          <img src="" alt="">
        </div>
      </div>
      <div class="newsDesc">
        <div class="text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
      <div class="newsBtn">
        <div class="newsEdit" id="entry1">
          <i class="far fa-edit"></i>
        </div>
        <div class="newsDelete">
          <i class="fas fa-trash-alt"></i>
        </div>
      </div>
    </div>
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
    <form class="modalBlog" action="index.html" method="post">
        esta es la wea de editar
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
