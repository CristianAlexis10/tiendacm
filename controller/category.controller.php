<?php
	class CategoryController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master = new MasterModel;
	 		$this->doizer = new DoizerController;
	 	}

		function newCategory(){
			$data = $_POST['data'];
			$data[]=1;
			$result = $this->doizer->specialCharater($data[0]);
			if ($result==false) {
				echo json_encode('Los campos no deben tener caracteres especiales');
			}else{
				$result = $this->master->insert('categoria',$data,array('cat_codigo'));
				if ($result==1) {
					echo json_encode(true);
				}else{
					$result = $this->doizer->knowError($result);
					echo json_encode($result);
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
			$result = $this->master->updaCate(array($_POST['nombre'],$_POST['estado'],$_SESSION['cat_mod']));
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
