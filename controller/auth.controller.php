<?php
	class AuthController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master =  MasterModel();
	 		$this->doizer = new DoizerController;
	 	}
		function validateUser(){
			$data = $_POST['data'];
			$result = $this->master->selectCount('usuario','usu_correo',$data[0]);
			if ($result[0]==1) {

				$resultData = $this->master->login->consultaUsuarioAcceso($data[0]);
				if (password_verify($data[1], $resultData['acc_contra'])) {
				    $_SESSION['USER']['NAME']=$resultData['usu_nombre1'];
				    $_SESSION['USER']['ADDRESS']=$resultData['usu_direccion'];
				    $_SESSION['USER']['ROL']=$resultData['rol_codigo'];
				    $_SESSION['USER']['CODE']=$resultData['usu_codigo'];
				    if ($_SESSION['USER']['ROL']==1) {
				   	 echo json_encode('admin');
				    }else{
				   	 echo json_encode('customer');
				    }
				} else {
				    echo json_encode(false);
				}
			}else{
				echo json_encode('El usuario no existe');
			}
		}

		function singOut(){
			session_destroy();
			echo json_encode(true);
		}
	}
?>
