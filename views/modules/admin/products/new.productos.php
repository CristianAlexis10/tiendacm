<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="icon" href="views/assets/img/logo_blanco.ico" type="image/ico">
    <link rel="stylesheet" href="views/assets/css/reset.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="views/assets/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=lato|Anton|Roboto:300,400,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
    <link type="text/css" rel="stylesheet" href="views/assets/css/croppie.css"  media="screen,projection"/>
    <script src="views/assets/js/multiple-select.js"></script>
    <link type="text/css" rel="stylesheet" href="views/assets/css/multiple-select.css"  media="screen,projection"/>
  </head>
  <body>
    <?php require_once("views/include/dashboard/topMenu.php"); ?>
    <?php require_once("views/include/dashboard/navigator.php"); ?>
    <section class="wrap--contenido">

<div class="contenidoProduct">
  <div class="titleProduct">
    <h1>Gestion productos</h1>
    <h4 id="modalColor"><i class="fas fa-plus-circle"></i> nuevo color</h4>
    <h4 id="modalTalla"><i class="fas fa-plus-circle"></i> nueva talla</h4>
  </div>
  <div class="backgroundModalColor"></div>
  <div class="wrapModalColor">
    <div class="modalColor">
      <h3>agregar nuevo color</h3>
      <form id="newColor">
        <div class="inputForm">
          <label for="Ncolor">color nuevo:</label>
          <input type="text" id="Ncolor">
        </div>
        <div class="btnForm">
          <button type="submit" name="button">guardar</button>
          <button type="button" id="cancelarColor">cancelar</button>
        </div>
      </form>
    </div>
  </div>
  <div class="backgroundModalTalla"></div>
  <div class="wrapModalTalla">
    <div class="modalTalla">
      <h3>agregar nueva talla</h3>
      <form id="newTal">
        <div class="inputForm">
          <label for="Ntal">talla nueva:</label>
          <input type="text" id="Ntal" value="">
        </div>
        <div class="btnForm">
          <button type="submit" name="button">guardar</button>
          <button type="button" id="cancelarTalla">cancelar</button>
        </div>
      </form>
    </div>
  </div>
<?php
if (isset($_SESSION['messagge'])) {
        echo "<div class='message'>".$_SESSION['messagge']."</div>";
        unset($_SESSION['messagge']);
  }?>
    <div class="wrap-form" id="reg-productos">
      <form class="form-producto" id="frmNewProduct">
      	<div class="regProdNom">
          <label for="" class="label">nombre:<span class="obligatorio">*</span></label>
          <input type="text" class="dataNewProd input" required>
      	</div>
      	<div class="regProdPre">
          <label for="" class="label">precio:<span class="obligatorio">*</span></label>
    		  <input type="number" class="dataNewProd input" required>
      	</div>
      	<!-- <div class="regProdCan"> -->
          <!-- <label for="" class="label">cantidad:<span class="obligatorio">*</span></label> -->
          <input type="hidden" class="dataNewProd input" value="0" required>
      	<!-- </div> -->
      	<div class="regProdDes">
          <label for="" class="label">descripción:<span class="obligatorio">*</span></label>
          <input type="text" class="dataNewProd input" required>
      	</div>
        <div class="wrapRegProdCat">
        <div class="regProdTal">
          <label>Tallas:<span class="obligatorio">*</span></label>
          <select multiple="multiple" id="selectMul" required>
            <?php
              foreach ($this->master->selectAll('talla') as $row) {?>
                <option value="<?php echo $row['tal_codigo']?>"><?php echo $row['tal_talla'] ?></option>
              <?php
              }
            ?>
          </select>
        </div>
        <div class="regProdCat">
          <label for="">categoria:<span class="obligatorio">*</span></label>
          <select required class="dataNewProd">
            <option value="">seleccionar categoria</option>
      			<?php
      				foreach ($this->master->selectAll('categoria') as $row) {?>
      					<option value="<?php echo $row['cat_codigo']?>"><?php echo $row['cat_nombre'] ?></option>
      				<?php
      				}
      			?>
      		</select>
      	</div>
        <div class="regProdCol">
          <label>Colores:<span class="obligatorio">*</span></label>
          <select multiple="multiple" id="selectMul2" required>
            <?php
              foreach ($this->master->selectAll('color') as $row) {?>
                <option value="<?php echo $row['col_codigo']?>"><?php echo $row['col_color'] ?></option>
              <?php
              }
            ?>
          </select>
        </div>
      </div>
        <div class="regProdImg">
          <div class="form-group Cambiar--img">
           <div id="wrap-result"><img src="views/assets/img/defaultProfile.png" ></div>
           <div class="wrapBtnImg">
             <h3 class="btnImg" id="cropp-img">Añadir foto<span class="obligatorio">*</span></h3>
           </div>
         </div>
         <div class="form-group Cambiar--img">
            <div id="wrap-result2"><img src="views/assets/img/defaultProfile.png" ></div>
            <h3 class="btnImg" id="cropp-img2">Añadir foto</h3>
          </div>
        </div>
      	<div class="regProdReg">
      		<button type="submit">Registrar</button>
      	</div>
      </form>
    </div>

    <div class="wrap-produ" id="list-productos">
      <table class="datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>nombre</th>
                <th>precio</th>
                <th>cantidad</th>
                <th>descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php $result = $this->master->selectAll('producto');
           foreach ($result as $row) {?>
            <tr>
                <td><?php echo $row['pro_codigo']; ?></td>
                <td><?php echo $row['pro_nombre']; ?></td>
                <td><?php echo $row['pro_precio']; ?></td>
                <td><?php echo $row['pro_cant']; ?></td>
                <td><?php echo $row['pro_des']; ?></td>
                <td>
                    <a href="moficar-producto-<?php echo $row['pro_codigo']; ?>"><i class="fas fa-sync"></i></a>

                        <a href="#" onclick="return confirmDelete(
                            <?php
                                echo $row['pro_codigo'];
                            ?>
                           )"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
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
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
<script src="views/assets/js/croppie.js"></script>
<script>
if (document.getElementById('selectMul')) {
   $('#selectMul').multipleSelect({
         placeholder: "Tallas"
     });
   $('#selectMul2').multipleSelect({
         placeholder: "Colores"
     });
}
</script>
<script src="views/assets/js/cropp-product.js"></script>
 <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="views/assets/js/main-admin.js"> </script>
<script src="views/assets/js/security.js"></script>
</section>
</body>
</html>
