<?php
	class CustomerController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master =  MasterModel();
	 		$this->doizer = new DoizerController;
	 	}
		function mainPage(){
			if (isset($_SESSION['USER']['CODE'])) {
				require_once "views/include/customer/header.php";
				require_once "views/modules/customer/tienda/tienda.php";
				require_once "views/include/customer/footer.php";
			}else{
				header("Location:inicio");
			}
		}
		function profile(){
			if (isset($_SESSION['USER']['CODE'])) {
				require_once "views/include/customer/header.php";
				require_once "views/modules/customer/profile/index.php";
				// require_once "views/include/customer/footer.php";
			}else{
				header("Location:inicio");
			}
		}
		function logout(){
			session_destroy();
			header("Location: inicio");
		}
		function update(){
			$data = $_POST['data'];
			$data[]=$_SESSION['USER']['CODE'];
			if (!$this->doizer->validateEmail($data[3])==true) {
				echo json_encode('El correo no es valido');
				return;
			}
			$result = $this->master->procedure->NRP("modificarDatosUsuario",$data);
			if ($result==true) {
				$_SESSION['USER']['NAME']=$data[0];
				$_SESSION['USER']['ADDRESS']=$data[4];
			 	echo json_encode($result);
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
	}
?>
