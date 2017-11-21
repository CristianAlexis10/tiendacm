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

		function view(){
			$data = $_GET['data'];
			require_once 'views/include/dashboard/header.php';
			require_once 'views/modules/dashboard/store/view-category.php';
			require_once 'views/include/dashboard/footer.php';
		}
	}
?>
