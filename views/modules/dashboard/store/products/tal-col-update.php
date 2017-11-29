<?php
$data_color = $this->master->selectBy('color_producto',array('por_codigo',$_SESSION['update_pro']));
$data_talla = $this->master->selectBy('talla_producto',array('pro_codigo',$_SESSION['update_pro']));
// print_r($_SESSION['update_pro']);
// $_SESSION['update_pro']=$_GET['data'];
?>
<div class="contenido">
  <form id="update-tallas">
      <p class="frm-title">Seleccione los colores disponibles:</p>
      <div class="frm-group">
               <?php
                        foreach ($this->master->selectAll("color") AS $row) {
                            if ($row['col_codigo']==$data_color['col_codigo']) {?>
                                <label><?php echo $row['col_color'] ?>
                                    <input type="checkbox"  name="color" checked value="<?php echo $row['col_codigo']?>"  >
                                </label>
                        <?php }else{ ?>
                            <label><?php echo $row['col_color'] ?>
                                <input type="checkbox"  name="color"  value="<?php echo $row['col_codigo']?>"  >
                            </label>
                            <?php
                            }
                        }  ?>
              </div>

              <p class="frm-title">Seleccione las tallas disponibles:</p>
      <div class="frm-group">
               <?php
                        foreach ($this->master->selectAll("talla") AS $row) {
                            if($row['tal_codigo']==$data_talla['tal_codigo']){?>
                                <label><?php echo $row['tal_talla'] ?>
                                  <input type="checkbox"  name="talla" checked value="<?php echo $row['tal_codigo']?>"  >
                                </label>
                        <?php }else{ ?>
                            <label><?php echo $row['tal_talla'] ?>
                              <input type="checkbox"  name="talla" value="<?php echo $row['tal_codigo']?>"  >
                            </label>
                        <?php } }  ?>
              </div>

              <div class="frm-group">
                  <button type="submit">Registar</button>
              </div>
  </form>
  <?php
      // echo $_SESSION['producto'];
  ?>
</div>
