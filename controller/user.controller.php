<?php
	class UserController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}

		function newUser(){
			$data = $_POST['data'];
			if ($data[3]==$data[4]) {
				//caracteres especiales
					$i = 0;
					foreach ($data as $key) {
						if (!$i == 2) {
							$result = $this->doizer->specialCharater($data[$i]);
							if ($result==false) {
								echo json_encode('Los campos no deben tener caracteres especiales');
								return;
							}
						}
					}
					if (!$this->doizer->validateEmail($data[2])==true) {
						echo json_encode('El correo no es valido');
						return;
					}
					if (!$data[3]===$data[4]) {
						echo json_encode('Las contraseñas no coinciden');
					}
					if (is_array($this->doizer->validateSecurityPassword($data[3]))) {
						$result = $tihs->master->insert('usuario',$data,array('usu_codigo','usu_apellido2','usu_direccion',));
					}
			}else{
				echo json_encode('Contraseñas Diferentes');
			}


		}
	}
?>
