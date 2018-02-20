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

	}
?>
