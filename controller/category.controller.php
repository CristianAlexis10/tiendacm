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
			$data[]=1;
			//foto de perfil
						if (isset($_FILES['file']['tmp_name'])) {
							$profile = $this->doizer->ValidateImage($_FILES,"views/assets/img/category/");
							if (is_array($profile)) {
								$data[] = $profile[1];
							}else{
								$_SESSION['messagge']=$profile;
								header("Location: gestion-categoria");
								return ;
							}
						}else{
							$data[] = 'default.jpg';
						}

			$result = $this->doizer->specialCharater($data[0]);
			if ($result==false) {
					$_SESSION['messagge']='Los campos no deben tener caracteres especiales';
					header("Location: gestion-categoria");
			}else{
				$result = $this->master->insert('categoria',$data,array('cat_codigo'));
				if ($result==1) {
							$_SESSION['messagge']='Registrado  Existosamente';
							header("Location: gestion-categoria");
				}else{
						$result = $this->doizer->knowError($result);
						$_SESSION['messagge']=$result;
						header("Location: gestion-categoria");
				}
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
					require_once 'views/modules/dashboard/store/update-category.php';
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
