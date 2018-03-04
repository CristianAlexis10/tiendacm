<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="views/assets/css/reset.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="views/assets/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=lato|Anton|Roboto:300,400,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link type="text/css" rel="stylesheet" href="views/assets/css/croppie.css"  media="screen,projection"/>
    <script src="views/assets/js/multiple-select.js"></script>
    <link type="text/css" rel="stylesheet" href="views/assets/css/multiple-select.css"  media="screen,projection"/>
  </head>
  <body>
      <?php require_once("views/include/dashboard/topMenu.php"); ?>
      <?php require_once("views/include/dashboard/navigator.php"); ?>
<div class="contenido">
  <h1>Actualizar imagenes</h1>
    <?php
        $data = $this->master->selectBy('producto',array('pro_codigo',$_SESSION['update_pro']));
        $allImage = $this->master->selectAllBy('por_imagenes',array('pro_codigo',$_SESSION['update_pro']));
    ?>
    <div class="wrapp-img" style="display:flex;flex-direction:row;">
        <div class="img-product">
            <img src="<?php echo "views/assets/img/products/".$data['pro_imagen'] ?>">
            <p class="deleteImgProduct" id="<?php echo $data['pro_imagen']?>">Eliminar</p>
        </div>
        <?php foreach ($allImage as $row) {?>
          <div class="img-product">
            <img src="<?php echo "views/assets/img/products/".$row['img'] ?>">
            <p class="deleteImgProduct" id="<?php echo $row['img']?>">Eliminar</p>
          </div>
        <?php } ?>
        <div class="form-group Cambiar--img">
          <div id="wrap-result"><img src="views/assets/img/defaultProfile.png" ></div>
          <span class="" id="cropp-img">Añadir foto</span>
        </div>

    </div>

   <!-- MODAL -->
   <div id="img-product">
       <div class="newMark--img">
         <span id="closeImg">&times;</span>
         <div id="uploadImage">
           <div id="wrap-upload" style="width:300px"></div>
           <input type="file" id="upload">
           <button class="btn btn-success upload-result" id="addImage">Agregar Imagen</button>
         </div>
       </div>
     </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
<script src="views/assets/js/croppie.js"></script>
<script>
if (document.getElementById('selectMul')) {
   $('#selectMul').multipleSelect({
         placeholder: "Selecciona las tallas disponibles"
     });
   $('#selectMul2').multipleSelect({
         placeholder: "Selecciona las colores disponibles"
     });
}
</script>
<script src="views/assets/js/update-product.js"></script>
 <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="views/assets/js/main-admin.js"> </script>
</section>
</body>
</html>
