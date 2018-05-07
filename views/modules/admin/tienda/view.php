<?php $data = $this->master->procedure->PRByAll("verDetallesPedido",array($_GET['data']."-".$_GET['data2']));?>
<section class="contenido" id="cat-conte">
  <h1>Pedido</h1>
  <div class="details">
    <div>
      <span>Cliente: <?php echo $data[0]['usu_nombre1']." ".$data[0]['usu_apellido1'];?></span>
    </div>
    <div>
      <span>Correo Cliente: <?php echo $data[0]['usu_correo'];?></span>
    </div>
    <div>
      <span>Telefono Cliente: <?php echo $data[0]['usu_telefono'];?></span>
    </div>
    <div>
      <span>Fecha de entrega del pedido: <?php echo $data[0]['ped_fecha_entrega'];?></span>
    </div>
    <div>
      <span>Direccion de envio: <?php echo $data[0]['mun_nombre']."-".$data[0]['ped_direccion'];?></span>
    </div>

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
  <input type="button" id="enviado" value="Marcar como enviado">
  <input type="button" id="terminado" value="Marcar como terminado">
</section>
