<?php $data_user = $this->master->selectBy("usuario",array("usu_codigo",$_GET['data']));
  $_SESSION['user_update'] = $_GET['data'];
?>
<section class="contenido" id="cat-conte">
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
        <input type="submit" value="Actualizar datos ">
      </div>
  </form>
</section>
