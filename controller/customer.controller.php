<?php
	class CustomerController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
		function mainPage(){
<<<<<<< HEAD
			require_once "views/include/usuario/header.php";
			require_once "views/modules/customer/index.php";
			require_once "views/include/usuario/footer.php";
=======
			require_once("views/include/usuario/header.php");
			require_once("views/modules/customer/index.php");
			require_once("views/include/usuario/footer.php");
>>>>>>> ea9deaf06e2752e8ecf2d17a523e2c0a538eb95d
		}
	}
?>
