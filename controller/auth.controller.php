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
				if (password_verify($data[1], $result['acc_contra'])) {
				    $result = $this->master->selectBy('usuario',array('acc_codigo',$result['acc_codigo']));
				    $_SESSION['USER']['NAME']=$result['usu_nombres'];
				    $_SESSION['USER']['ADDRESS']=$result['usu_direccion'];
				    $_SESSION['USER']['ROL']=$result['rol_codigo'];
				    $_SESSION['USER']['CODE']=$result['usu_codigo'];
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
	}
?>
