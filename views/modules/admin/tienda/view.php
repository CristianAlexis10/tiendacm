<?php $data = $this->master->procedure->PRByAll("verDetallesPedido",array($_GET['data']."-".$_GET['data2']));
  $_SESSION['ped'] = $data[0]['ped_codigo'];
?>
<section class="contenido" id="cat-conte">
  <h1>Pedido</h1>
  <div class="details">
    <div class="infoDetail">
      <span>Cliente: <?php echo $data[0]['usu_nombre1']." ".$data[0]['usu_apellido1'];?></span>
    </div>
    <div class="infoDetail">
      <span>Correo Cliente: <?php echo $data[0]['usu_correo'];?></span>
    </div>
    <div class="infoDetail">
      <span>Telefono Cliente: <?php echo $data[0]['usu_telefono'];?></span>
    </div>
    <div class="infoDetail">
      <span>Fecha de entrega del pedido: <?php echo $data[0]['ped_fecha_entrega'];?></span>
    </div>
    <div class="infoDetail">
      <span>Direccion de envio: <?php echo $data[0]['mun_nombre']."-".$data[0]['ped_direccion'];?></span>
    </div>
    <div class="infoDetail">
      <span>Estado: <?php echo $data[0]['ped_estado'];?></span>
    </div>
    <div class="infoDetail">
      <span>Total a Pagar: <td><?php echo number_format($data[0]['ped_total']); ?></td></span>
    </div>
    <div class="">
    <table class="datatable">
      <thead>
          <tr>
              <th>Producto</th>
              <th>Color</th>
              <th>Talla</th>
              <th>Cantidad</th>
          </tr>
      </thead>
      <tbody>
        <?php
         foreach ($data as $row) { ?>
          <tr>
              <td><?php echo $row['pro_nombre']; ?></td>
              <td><?php echo $row['col_color']; ?></td>
              <td><?php echo $row['tal_talla']; ?></td>
              <td><?php echo $row['cantidad']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php
if ($data[0]['ped_estado']=="Bodega") {
  echo '<input type="button" id="enviado" value="Marcar como en proceso">';
}
if ($data[0]['ped_estado']=="En Proceso") {
  echo '<input type="button" id="terminado" value="Marcar como terminado">';
}
?>

</section>
