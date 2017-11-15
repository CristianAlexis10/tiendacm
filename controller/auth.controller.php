<?php
	class AuthController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}
		function validateUser(){
			$data = $_POST['data'];
			echo json_encode($data);
		}
	}
?>
