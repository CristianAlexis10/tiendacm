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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css">
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
  <div class="titleProductTable">
    <h1>Gestion de Pedidos</h1>
    <h4 id="bodega"><i class="fas fa-info-circle"></i> En Bodega</h4>
    <h4 id="pro"><i class="fas fa-info-circle"></i> En proceso</h4>
    <h4 id="ter"><i class="fas fa-info-circle"></i> Terminados</h4>
  </div>
<?php
if (isset($_SESSION['messagge'])) {
        echo "<div class='message'>".$_SESSION['messagge']."</div>";
        unset($_SESSION['messagge']);
  }?>
    <div class="wrap-produ" id="list-productos">
      <table class="datatable">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Estado</th>
                <th>Cliente</th>
                <th>Fecha Realizacion</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php $result = $this->master->selectAll('pedidos');
           foreach ($result as $row) {
              $dataUser = $this->master->selectBy("usuario",array("usu_codigo",$row['usu_id']));
              $dataMun = $this->master->selectBy("municipio",array("mun_codigo",$row['mun_codigo']));
             ?>
            <tr>
                <td><?php echo $row['token']; ?></td>
                <td><?php echo $row['ped_estado']; ?></td>
                <td><?php echo $dataUser['usu_nombre1']." ".$dataUser['usu_apellido1']; ?></td>
                <td><?php echo $row['ped_fecha_realizacion']; ?></td>
                <!-- <td><?php //echo $row['pro_cant']; ?></td> -->
                <td><?php echo $dataMun['mun_nombre'].",".$row['ped_direccion']; ?></td>
                <td>
                    <a href="ver-pedido-<?php echo $row['token']; ?>"><i class="far fa-eye"></i></a>

                        <a href="#" onclick="return confirmDeletePedido(
                            <?php
                                echo $row['ped_codigo'];
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
$("#bodega").click(function(){
  $("input[type='search']").val("En Bodega");
  $("input[type='search']").keyup();
});
$("#ter").click(function(){
  $("input[type='search']").val("Terminado");
  $("input[type='search']").keyup();
});
$("#En Proceso").click(function(){
  $("input[type='search']").val("En Proceso");
  $("input[type='search']").keyup();
});
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
