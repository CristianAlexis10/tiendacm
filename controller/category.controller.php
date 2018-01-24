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
			if (isset($_SESSION['new_cropp_image'])) {
						$result_cat = $this->master->selectBy("categoria",array('cat_codigo',$_SESSION['cat_mod']));
						$result = $this->master->product->updaCateImg(array($_SESSION['new_cropp_image'],$_SESSION['cat_mod']));
						if ($result==true) {
							unlink("views/assets/img/category/".$result_cat['cat_img']);
							unset($_SESSION['new_cropp_image']);
						}else{
							echo json_encode($this->doizer->knowError($result));
							return ;
						}
				}
			$result = $this->master->product->updaCate(array($_POST['name'],$_POST['sta'],$_SESSION['cat_mod']));
				if ($result==1) {
					echo json_encode(true);
				}else{
					echo json_encode($this->doizer->knowError($result));
				}
		}

	}
?>
