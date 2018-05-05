<section class="contenido" id="cat-conte">
<div class="wrapStructure">
  <div id="NOTICIA" class="newStructure"></div>
  <div class="opciones-de-agregar">
    <input class="newContent" type="button" id="crearTitulo" value="Crear Titulo">
    <input class="newContent" type="button" id="crearParrafo" value="Crear Parrafo">
    <input class="newContent" type="button" id="crearParrafo2" value="Crear parrafo 2 columnas">
    <input class="newContent" type="button" id="crearImagen" value="Crear imagen">
    <input class="newContent" type="button" id="fin" value="Guardar Noticia">
  </div>
  <!-- modales -->
  <!-- nuevo titulo -->
  <div class="backgroundModalBlog" id="modalNewEntry">
    <form class="modalBlog" id="nuevoTitulo">
            <div class="newNew">
              <label for="addTitle">Titulo:<span class="obligatorio">*</span></label>
              <input maxlength="45" type="text" class="input" id="addTitle" required>
            </div>
           <input type="submit"  value="Agregar">
            <button type="button" name="button" id="closeNewEntry">cancelar</button>
    </form>
  </div>
  <!-- nuevo parrafo 1 columna -->
  <div class="backgroundModalBlog" id="modalNewParrafo">
    <form class="modalBlog" id="nuevoParrafo">
            <div class="newNew">
              <label for="parrafo">Contenido:<span class="obligatorio">*</span></label>
              <textarea id="parrafo" rows="8" cols="60" required></textarea>
            </div>
           <input type="submit"  value="Agregar">
            <button type="button" name="button" id="closeParrafo">cancelar</button>
    </form>
  </div>
  <!-- nuevo parrafo 2 columna -->
  <div class="backgroundModalBlog" id="modalNewParrafo2">
    <form class="modalBlog" id="nuevoParrafo2">
            <div class="newNew">
              <label for="parrafo2">Contenido Columna 1 :<span class="obligatorio">*</span></label>
              <textarea id="parrafo2" rows="8" cols="60" required></textarea>
              <label for="parrafo22">Contenido columna 2:<span class="obligatorio">*</span></label>
              <textarea id="parrafo22" rows="8" cols="60" required></textarea>
            </div>
           <input type="submit"  value="Agregar">
            <button type="button" name="button" id="closeParrafo2">cancelar</button>
    </form>
  </div>
  <!-- nuevo imagen-->
  <div class="backgroundModalBlog" id="newImg">
    <form class="modalBlog" enctype="multipart/form-data" id="formuploadajaxNoticia" >
        <div class="newNew">
          <input type="file" name="archivo1" required>
        </div>
      <div class="wrapBtnVideo">
        <button type="submit" name="button">Guardar</button>
        <button type="button" name="button" id="closeParrafo">cancelar</button>
      </div>
    </form>
  </div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
<script src="views/assets/js/croppie.js"></script>
<script src="views/assets/js/new.js"></script>
<script src="views/assets/js/main-admin.js"> </script>
<script src="views/assets/js/shortcut.js"></script>
<!-- <script src="views/assets/js/security.js"></script> -->
</body>
</html>
