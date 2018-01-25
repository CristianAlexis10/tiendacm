<div class="fondo" id="fondo"></div>
<div class="wrapRegCat">
    <div class="reg_categoria" id="reg_categoria">
      <div class="wrapGrid">
        <div class="">
          <h2>Añadir categoria</h2>
        </div>
          <form action="nueva-categoria" method="post" enctype="multipart/form-data" class="">
            <div class="">
              <label for="">categoria: </label>
              <input type="text" name="data[]">
            </div>
            <div class="frm-form">
              <input type="file" name="file" id="file">
            </div>
            <div class="">
              <button type="submit">guardar</button>
            </div>
        </form>
      </div>
    </div>
</div>
