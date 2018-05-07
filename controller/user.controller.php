<?php
	class UserController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master =  MasterModel();
	 		$this->doizer = new DoizerController;
	 	}
		function readByEmail(){
			$data=$_POST['data'];
			$result = $this->master->selectBy('usuario',array('usu_correo',$data));
			if ($result != array()) {
				echo  json_encode(true);
			}else{
				echo json_encode(false);
			}
		}
		function newUser(){
			$data = $_POST['data'];
			if ($data[3]==$data[4]) {
				//caracteres especiales
					$i = 0;
					foreach ($data as $key) {
						if ($i == 2) {
						}else{
							$result = $this->doizer->specialCharater($data[$i]);
							if ($result==false) {
								echo json_encode('Los campos no deben tener caracteres especiales');
								return;
							}

						}
						$i++;
					}
					if (!$this->doizer->validateEmail($data[2])==true) {
						echo json_encode('El correo no es valido');
						return;
					}
					if (!$data[3]===$data[4]) {
						echo json_encode('Las contraseñas no coinciden');
					}
					$password = $this->doizer->validateSecurityPassword($data[3]);
					if (is_array($password)) {
						$a = $this->master->user->crearUsuario(array($data[0],$data[1],$data[2],2,1,1));
						$result = $this->master->user->consultaUsuarioByCorreo($data[2]);
						$result = $this->master->login->crearAcceso(array(md5($data[2].date('y-m')),$result['usu_codigo'],$password[1]));
						// die(json_encode($a));
						if ($a==true) {
							echo json_encode('Registardo con exito');
						}else{
							echo json_encode($this->doizer->knowError($a));
						}
					}else{
						echo json_encode($password);
					}
			}else{
				echo json_encode('Contraseñas Diferentes');
			}


		}
		function viewAllUser(){
			if ($_SESSION['USER']['ROL']==1) {
				require_once("views/include/dashboard/header.php");
				require_once("views/modules/admin/users/index.php");
				require_once("views/include/dashboard/footer.php");
			}else{
					session_destroy();
					header("Location:inicio");
			}
		}
		function delete(){
			$result=$this->master->delete("usuario",array("usu_codigo",$_POST['data']));
			// die(json_encode($result));
			if ($result==1) {
				echo json_encode(true);
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
		function viewUpdate(){
			if ($_SESSION['USER']['ROL']==1) {
				require_once("views/include/dashboard/header.php");
				require_once("views/modules/admin/users/update.php");
				require_once("views/include/dashboard/footer.php");
			}else{
					session_destroy();
					header("Location:inicio");
			}
		}
	}
?>
