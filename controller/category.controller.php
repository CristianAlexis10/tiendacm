<?php
	class CategoryController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master =  MasterModel();
	 		$this->doizer = new DoizerController;
	 	}

		function newCategory(){
			$data = $_POST['data'];
			$estado=1;
			//campos vacion
			if ($data=="") {
				echo json_encode("Por favor llene los campos");
				return ;
			}
			// caracteres especiales
			$result = $this->doizer->specialCharater($data[0]);
			if ($result==false) {
					echo json_encode('Los campos no deben tener caracteres especiales');
					return ;
			}
			//existe imagen
			if (!isset($_SESSION['new_cropp_image'])) {
				echo json_encode("Por favor seleccione una imagen");
				return ;
			}
			$result = $this->master->insert('categoria',array($data,$estado,$_SESSION['new_cropp_image']),array('cat_codigo'));
			if ($result==true) {
				echo json_encode(true);
				$_SESSION['messagge']="Registrada Con Exito";
				unset($_SESSION['new_cropp_image']);
			}else{
				echo json_encode($this->doizer->knowError($result));
			}
		}
		function delete(){
			$data = $_GET['data'];
			$result = $this->master->delete('categoria',array('cat_codigo',$data));
			if ($result==1) {
				$_SESSION['messagge']='Eliminado Existosamente';
				header("Location: gestion-categoria");
			}else{
				$_SESSION['messagge']=$this->doizer->knowError($result);
				header("Location: gestion-categoria");
			}
		}

		function view(){
			if (isset($_SESSION['USER']['ROL'])) {
				if ($_SESSION['USER']['ROL']==1) {
					$data = $_GET['data'];
					require_once 'views/include/dashboard/header.php';
					require_once 'views/modules/dashboard/store/view-category.php';
					require_once 'views/include/dashboard/footer.php';
				}else{
					header("Location: catalogo");
				}
			}else{
				header("Location: catalogo");
			}
		}
		function viewUpdate(){
			if (isset($_SESSION['USER']['ROL'])) {
				if ($_SESSION['USER']['ROL']==1) {
					$data = $_GET['data'];
					require_once 'views/include/dashboard/header.php';
					require_once 'views/modules/admin/category/update-category.php';
					require_once 'views/include/dashboard/footer.php';
				}else{
					header("Location: catalogo");
				}
			}else{
				header("Location: catalogo");
			}
		}
		function update(){
			//foto de perfil
						if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name']!= null) {
							$profile = $this->doizer->ValidateImage($_FILES,"views/assets/img/category/");
							if (is_array($profile)) {
									$result = $this->master->product->updaCateImg(array($profile[1],$_SESSION['cat_mod']));
							}else{
								$_SESSION['messagge']=$profile;
								header("Location: gestion-categoria");
								return ;
							}
						}
						$result = $this->master->product->updaCate(array($_POST['nombre'],$_POST['estado'],$_SESSION['cat_mod']));


			if ($result==1) {
				$_SESSION['messagge']='Modificado Existosamente';
				header("Location: gestion-categoria");
			}else{
				$_SESSION['messagge']=$this->doizer->knowError($result);
				header("Location: gestion-categoria");
			}
		}

	}
?>
