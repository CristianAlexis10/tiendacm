<div class="sliderProfile">
  <div class="wrap--text">
    <h2>PERFIL</h2>
  </div>
</div>
<div class="contenido">
  <?php
  $data_user = $this->master->selectBy("usuario",array('usu_codigo',$_SESSION['USER']['CODE']));
    if (isset($_SESSION['new_ped_token'])) {
      echo "<div class='messageNewOreder'>El codigo de tu pedido es: ".$_SESSION['new_ped_token']."</div>";
      unset($_SESSION['new_ped_token']);
    }
  ?>
  <div id="accordion">
    <h3>Historial de pedidos</h3>
    <div >
          <h1>Pedidos</h1>
          <table class="datatable">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Estado</th>
                    <th>Fecha De entrega</th>
                    <th>Dirección</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php $result = $this->master->selectAllBy('pedidos',array('usu_id',$_SESSION['USER']['CODE']));
               foreach ($result as $row) {?>
                <tr>
                    <td><?php echo $row['token']; ?></td>
                    <td><?php echo $row['ped_estado']; ?></td>
                    <td><?php echo $row['ped_fecha_entrega']; ?></td>
                    <td><?php echo $row['ped_direccion']; ?></td>
                    <td><?php echo number_format($row['ped_total']); ?></td>
                    <td><?php echo $row['ped_estado']; ?></td>
                    <td>
                      <a href="#"><i class="far fa-eye" id="opneModalPedido"></i></a>
                      <a href="#" onclick="return confirmDelete( <?php echo $row['ped_codigo']; ?> )"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
    </div>
    <h3>Datos personales</h3>
    <div>
      <form id="datosPersonales" class="formProfile">
          <div class="inputProfile">
              <label for="nombre">Nombre: </label>
              <input type="text" id="nombre" placeholder="Ingresa tu nombre" value="<?php echo $data_user['usu_nombre1'];?>" required>
          </div>
          <div class="inputProfile">
              <label for="ape1">Primer Apellido: </label>
              <input type="text" id="ape1" placeholder="Ingresa tu Apellido" value="<?php echo $data_user['usu_apellido1'];?>" required>
          </div>
          <div class="inputProfile">
              <label for="ape2">Segundo Apellido: </label>
              <input type="text" id="ape2" placeholder="Ingresa tu segundo apellido" value="<?php echo $data_user['usu_apellido2'];?>" required>
          </div>
          <div class="inputProfile">
              <label for="correo">Correo: </label>
              <input type="email" id="correo" placeholder="Ingresa tu correo" value="<?php echo $data_user['usu_correo'];?>" required>
          </div>
          <div class="inputProfile">
              <label for="dir">Dirección: </label>
              <input type="text" id="direccion" placeholder="Ingresa tu dirección" value="<?php echo $data_user['usu_dir'];?>" required>
          </div>
          <div class="inputProfile">
              <label for="ciu">Ciudad: </label>
            <select id="ciu">
              <?php
                foreach ($this->master->selectAll("municipio") as $row) {
                if ($row['mun_codigo']==$data_user['mun_codigo']) {
                  echo "<option value='".$row['mun_codigo']."' selected>".$row['mun_nombre']."</option>";
                }else{
                  echo "<option value='".$row['mun_codigo']."'>".$row['mun_nombre']."</option>";
                }
                }
              ?>
            </select>
          </div>
          <div class="inputProfile">
              <label for="cel">Celular: </label>
              <input type="number" id="celular" placeholder="Ingresa tu celular" value="<?php echo $data_user['usu_telefono'];?>" required>
          </div>
          <div class="inputProfile">
            <input type="submit" value="Actualizar datos de contacto">
          </div>
      </form>
    </div>
  </div>
</div>
<div class="wrapModalPedido">
  <div class="modalPedido">
    <div class="">
      <table class="datatable">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Fecha De entrega</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php $result = $this->master->selectAllBy('pedidos',array('usu_id',$_SESSION['USER']['CODE']));
           foreach ($result as $row) {?>
            <tr>
                <td><?php echo $row['token']; ?></td>
                <td><?php echo $row['ped_fecha_entrega']; ?></td>
                <td><?php echo $row['ped_direccion']; ?></td>
                <td><?php echo $row['ped_estado']; ?></td>
                <td>
                  <a href="moficar-producto-<?php echo $row['ped_codigo']; ?>"><i class="far fa-eye"></i></a>
                  <a href="#" onclick="return confirmDelete( <?php echo $row['ped_codigo']; ?> )"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <button type="button" name="button" id="closePedido">cancelar</button>
  </div>
</div>
</section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="views/assets/js/main.js"></script>
  <script src="views/assets/js/carrito.js"></script>
  </body>
</html>
