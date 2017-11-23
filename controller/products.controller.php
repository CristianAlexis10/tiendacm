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
     	require_once("views/modules/tienda/new.productos.php");
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
			$profile = $this->doizer->ValidateImage($_FILES,"views/assets/img/");
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

		$result = $this->master->insert('producto',$data,array('pro_codigo'));
		if ($result==1) {
				$_SESSION['messagge']='Registrado Existosamente';
				header("Location: gestion-producto");
			}else{
				$_SESSION['messagge']=$this->doizer->knowError($result);
				header("Location: gestion-producto");
			}
	}

}
?>
