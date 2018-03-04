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
<?php
$data = $this->master->selectBy('producto',array('pro_codigo',$_GET['data']));
//Colores
$colors = $this->master->selectAllBy('color_producto',array('por_codigo',$_GET['data']));
$colors_real;
foreach ($colors as $row) {
		$colors_real[]=$row['col_codigo'];
}
//Tallas
$tallas = $this->master->selectAllBy('talla_producto',array('pro_codigo',$_GET['data']));
$tallas_real;
foreach ($tallas as $row) {
		$tallas_real[]=$row['tal_codigo'];
}
$_SESSION['update_pro']=$_GET['data'];
?>
<div class="contenido">
  <h1>Actualizar productos</h1>
  <div class="wrap-form">
	<form class="form-producto" id="frmUpdatePro">
      	<div class="wrapInput">
          <label for="">nombre: </label>
      		<input type="text" class="dataUpdate"  value="<?php echo $data['pro_nombre']?>" required>
      	</div>
      	<div class="wrapInput">
          <label for="">precio: </label>
      		<input type="text" class="dataUpdate" value="<?php echo $data['pro_precio']?>" required>
      	</div>
      	<div class="wrapInput">
          <label for="">cantidad: </label>
      		<input type="number" class="dataUpdate"  value="<?php echo $data['pro_cant']?>" required>
      	</div>
      	<div class="wrapInput">
          <label for="">descripción: </label>
      		<input type="text" class="dataUpdate" value="<?php echo $data['pro_des']?>" required>
      	</div>
				<div class="">
                    Colores:
					<select id="selectMul" multiple >
						<?php
							foreach ($this->master->selectAll('color') as $row) {
								if (in_array($row['col_codigo'],$colors_real)) {?>
									<option value="<?php echo $row['col_codigo']?>" selected><?php echo $row['col_color'] ?></option>
								<?php }else{ ?>
								<option value="<?php echo $row['col_codigo']?>"><?php echo $row['col_color'] ?></option>
							<?php
								}
							}
						?>
					</select>
				</div>
				<div class="">
                    Tallas:
					<select id="selectMul2" multiple >
						<?php
							foreach ($this->master->selectAll('talla') as $row) {
								if (in_array($row['tal_codigo'],$tallas_real)) {?>
									<option value="<?php echo $row['tal_codigo']?>" selected><?php echo $row['tal_talla'] ?></option>
								<?php }else{ ?>
								<option value="<?php echo $row['tal_codigo']?>"><?php echo $row['tal_talla'] ?></option>
							<?php
								}
							}
						?>
					</select>
				</div>
      	<div class="wrapInput">
          <label for="">categoria: </label>
      		<select required class="dataUpdate">
            <option value="">seleccionar categoria</option>
      			<?php
      				foreach ($this->master->selectAll('categoria') as $row) {
      					if ($row['cat_codigo']==$data['cat_codigo']) {?>
      						<option value="<?php echo $row['cat_codigo']?>" selected><?php echo $row['cat_nombre'] ?></option>
      					<?php }else{ ?>
      					<option value="<?php echo $row['cat_codigo']?>"><?php echo $row['cat_nombre'] ?></option>
      				<?php
      					}
      				}
      			?>
      		</select>
      	</div>
      	<div class="wrapInput">
      		estado:<select class="dataUpdate">
      			<?php
      				if ($data['pro_estado']=="activo") {?>
      					<option value="activo" selected>Activo</option>
      					<option value="inactivo">Inactivo</option>
      				<?php }else{?>
      					<option value="activo" >Activo</option>
      					<option value="inactivo" selected>Inactivo</option>
      				<?php } ?>
      		</select>
      	</div>
      	<div class="wrapInput">
      		<button type="submit">Guardar</button>
      	</div>
      </form>
      </div>
      <div class="more">
      	<a href="cambiar-imagenes">Imagenes</a>
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
 <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="views/assets/js/main-admin.js"> </script>
<script src="views/assets/js/update-product.js"> </script>
</section>
</body>
</html>
