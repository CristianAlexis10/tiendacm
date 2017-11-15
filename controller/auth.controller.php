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
			$result = $this->master->selectCount('acceso','acc_correo',$data[0]);
			if ($result[0]==1) {
				$result = $this->master->selectBy('acceso',array('acc_correo',$data[0]));
				if ($result['acc_contra']==$data[1]) {
					echo json_encode(true);
				}else{
					echo json_encode(false);
				}
			}else{
				echo json_encode('El usuario no existe');
			}
		}
	}
?>
