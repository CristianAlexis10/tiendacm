<div class="fondo" id="fondo"></div>
  <div class="reg_categoria" id="reg_categoria">
    <h2>Añadir categoria</h2>
    <!-- <div class="reg_categoria_form"> -->
    <div class="">
      <form action="nueva-categoria" method="post" enctype="multipart/form-data">
          <div class="frm-form">
              <label for="">Ingrese el nombre de la categoria</label>
              <input type="text" name="data[]" placeholder="Ingresa el nombre de la categoria">
          </div>
          <div class="frm-form">
            <label for="file">Ingrese el nombre de la categoria</label>
            <input type="file" name="file" id="file">
        </div>
        <button type="submit">guardar</button>
      </form>
    </div>
  </div>
