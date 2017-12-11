<?php
	class CustomerController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
		function mainPage(){
			require_once "views/include/usuario/header.php";
			require_once "views/include/usuario/topMenu-logeado.php";
			require_once "views/modules/customer/index.php";
			require_once "views/include/usuario/footer.php";
		}
	}
?>
