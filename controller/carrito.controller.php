<?php
	class CarritoController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master =  MasterModel();
	 		$this->doizer = new DoizerController;
	 	}

		function delete(){
			$data = $_POST['data'];
			unset($_SESSION['cart_item'][$data]);
			echo json_encode($_SESSION['cart_item']);
		}
	}
?>
