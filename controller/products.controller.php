<?php
class ProductsController{
	private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master =  MasterModel();
	 		$this->doizer = new DoizerController;
	 	}
	function mainPage(){
     require_once("views/modules/admin/products/new.productos.php");
	}
	function readByCod(){
		$data = $_POST['data'];
		$result = $this->master->selectBy('producto',array('pro_codigo',$data));
		echo json_encode($result);
	}

	function readByCodColor(){
		$data = $_POST['data'];
		$result = $this->master->product->colores($data);
		echo json_encode($result);
	}
	function readByCodTalla(){
		$data = $_POST['data'];
		$result = $this->master->product->tallas($data);
		echo json_encode($result);
	}
	function newRegister(){
		$data = $_POST['data'];
		$i = 0;
		foreach ($data as $input) {
			if ($data[$i]=='') {
				echo json_encode('Campos vacios');
				return ;
			}
			$i++;
		}

		if (isset($_SESSION['new_cropp_image'])) {
					$data[]=$_SESSION['new_cropp_image'];
		}else{
			echo json_encode('por favor selecciona una imagen');
			return ;
		}
		$data[]="activo";
		$result = $this->master->product->crearProducto($data);
		if ($result==true) {
				$pro_codigo=$this->master->selectBy("producto",array('pro_nombre',$data[0]));
				//registrar colores
				foreach ($_POST['color'] as $color) {
					$result= $this->master->product->color_producto(array($color,$pro_codigo['pro_codigo']));
				}
				//registrar tallas
				if ($result==true) {
					foreach ($_POST['tallas'] as $talla) {
						$result= $this->master->product->talla_producto(array($pro_codigo['pro_codigo'],$talla));
					}
				}else{
					echo json_encode($this->doizer->knowError($result));
				}
				if ($result==true) {
					//segunda imagen
					if (isset($_SESSION['product_img2'])) {
							$result = $this->master->insert('por_imagenes',array($pro_codigo['pro_codigo'],$_SESSION['product_img2']));
							unset($_SESSION['product_img2']);
							$_SESSION['message']="Registrado con exito";
							echo json_encode(true);
					}else{
						echo json_encode(true);
					}
					unset($_SESSION['new_cropp_image']);
				}else{
					echo json_encode($this->doizer->knowError($result));
				}
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
	}


	function delete(){
		$data = $_POST['data'];
		$result = $this->master->product->eliminarProducto($data);
		if ($result==true) {
			$_SESSION['messagge']='Eliminado Exitosamente';
			echo json_encode(true);
		}else{
			echo json_encode($this->doizer->knowError($result));
		}
	}
	function viewUpdate(){
     		require_once("views/modules/admin/products/product-update.php");
	}

	function update(){
		$data = $_POST['data'];
		//modificar en la tabla producto
		$result = $result = $this->master->update('producto',array('pro_codigo',$_SESSION['update_pro']),array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5]),array('pro_codigo','pro_imagen'));
		if ($result==true) {
			//guardar colores
			$result = $this->master->delete("color_producto",array("por_codigo",$_SESSION['update_pro']));
			foreach ($data[6] as $color) {
				$result= $this->master->insert('color_producto',array($color,$_SESSION['update_pro']));
			}
			//guardar tallas
			$result = $this->master->delete("talla_producto",array("pro_codigo",$_SESSION['update_pro']));
			foreach ($data[7] as $talla) {
				$result= $this->master->insert('talla_producto',array($_SESSION['update_pro'],$talla));
			}
			echo json_encode("Modificación Exitosa");
		}else{
			echo json_encode($this->doizer->knowError($result));
		}

	}
	function viewImages(){
		require_once "views/modules/admin/products/view-img.php";
	}

}
?>
