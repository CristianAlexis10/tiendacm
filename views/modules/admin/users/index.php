

<div class="contenidoProduct">
  <div class="titleProduct">
    <h1>Gestion de Usuarios</h1>
    <!-- <h4 id="modalColor"><i class="fas fa-plus-circle"></i>En proceso</h4>
    <h4 id="modalTalla"><i class="fas fa-plus-circle"></i> Terminados</h4> -->
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
                <th>Cliente</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php $result = $this->master->selectAll('usuario');
           foreach ($result as $row) {
              // $dataUser = $this->master->selectBy("usuario",array("usu_codigo",$row['usu_id']));
              $dataMun = $this->master->selectBy("municipio",array("mun_codigo",$row['mun_codigo']));
             ?>
            <tr>
                <td><?php echo $row['usu_nombre1']." ".$row['usu_apellido1']; ?></td>
                <td><?php echo $row['usu_correo']; ?></td>
                <td><?php echo $row['usu_telefono']; ?></td>
                <td><?php echo $dataMun['mun_nombre'].",".$row['usu_dir']; ?></td>
                <td>
                    <a href="modificar-usuario-<?php echo $row['usu_codigo']; ?>"><i class="fas fa-sync"></i></a>

                        <a href="#" onclick="return confirmDeleteUser(
                            <?php
                                echo $row['usu_codigo'];
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
