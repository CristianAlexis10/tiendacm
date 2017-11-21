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
	}
?>
