<?php
	class CarritoController{
		private $master;
		private $doizer;
	 	function __CONSTRUCT(){
	 		$this->master =  MasterModel();
	 		$this->doizer = new DoizerController;
	 	}
		function add(){
			$data=$_POST['data'];
			$result = $this->master->selectBy("producto",array('pro_codigo',$_SESSION['product_open']));
			$color = $this->master->selectBy("color",array('col_codigo',$data['color']));
			$talla = $this->master->selectBy("talla",array('tal_codigo',$data['talla']));
			$_SESSION['cart_item'][]=array("producto"=>$result['pro_nombre'],"cantidad"=>$data['cantidad'],"precio"=>($result['pro_precio']*$data['cantidad']),"color"=>$color['col_color'],"talla"=>$talla['tal_talla'],"image"=>$result['pro_imagen']);
			echo json_encode(true);

		}
		function delete(){
			$data = $_POST['data'];
			unset($_SESSION['cart_item'][$data]);
			echo json_encode($_SESSION['cart_item']);
		}
		function newOrder(){
			echo json_encode("yws");
		}
	}
?>
