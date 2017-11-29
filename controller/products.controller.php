<?php
class ProductsController{
	private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
	function mainPage(){
		 require_once("views/include/dashboard/header.php");
     		require_once("views/modules/dashboard/store/products/new.productos.php");
     		require_once("views/include/dashboard/footer.php");
	}

	function newRegister(){
		$data = $_POST['data'];
		// die(print_r($data));
		$i = 0;
			foreach ($data as $input) {
				if ($data[$i]=='') {
					$_SESSION['messagge']='Campos vacios';
					header("Location: gestion-producto");
					return ;
				}
				if ($i==13) {
				}else{
					$result = $this->doizer->specialCharater($data[$i]);
					if ($result==false) {
						$_SESSION['messagge']='los campos no deben tener caracteres especiales';
						header("Location: gestion-producto");
						return;
					}
				}
				$i++;
			}
		if (isset($_FILES['file']['tmp_name'])) {
			$profile = $this->doizer->ValidateImage($_FILES,"views/assets/img/products/");
			if (is_array($profile)) {
				$data[] = $profile[1];
			}else{
				$_SESSION['messagge']=$profile;
				header("Location: gestion-producto");
				return ;
			}
		}else{
			$data[] = 'default.jpg';
		}
		$data[]="activo";

		$result = $this->master->insert('producto',$data,array('pro_codigo'));
		if ($result==1) {
				$result = $this->master->selectBy('producto',array('pro_nombre',$data[0]));
				$_SESSION['producto']=$result['pro_codigo'];
				header("Location: colores-producto");
			}else{
				$_SESSION['messagge']=$this->doizer->knowError($result);
				die('nada5');
				header("Location: gestion-producto");
			}
	}

	function colores(){
		require_once("views/include/dashboard/header.php");
     		require_once("views/modules/dashboard/store/products/product-color.php");
     		require_once("views/include/dashboard/footer.php");
	}
	function coloresTallas(){
		if (isset($_POST['colores'])   &&  isset($_POST['tallas'])) {
			$colores = $_POST['colores'];
			$tallas = $_POST['tallas'];
		}else{
			echo json_encode('Por favor selecciona al menos un color y una talla');
			return;
		}

		foreach ($colores as $color) {
			$result= $this->master->insert('color_producto',array($color,$_SESSION['producto']));
		}
		foreach ($tallas as $talla) {
			$result= $this->master->insert('talla_producto',array($_SESSION['producto'],$talla));
		}
		if ($result==1) {
			$_SESSION['messagge']='Registrado Exitosamente';
			echo json_encode(true);
		}else{
			echo json_encode($this->doizer->knowError($result));
		}
	}

	function delete(){
		$data = $_POST['data'];
		$result = $this->master->delete('producto',array('pro_codigo',$data));
		if ($result==true) {
			$_SESSION['messagge']='Eliminado Exitosamente';
			echo json_encode(true);
		}else{
			echo json_encode($this->doizer->knowError($result));
		}
	}
	function viewUpdate(){
		require_once("views/include/dashboard/header.php");
     		require_once("views/modules/dashboard/store/products/product-update.php");
     		require_once("views/include/dashboard/footer.php");
	}

}
?>
