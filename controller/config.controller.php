<?php
	class ConfigController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master =  MasterModel();
	 		$this->doizer = new DoizerController;
	 	}

		function cart(){
			require_once("views/include/cart.php");
		}
	}
?>
