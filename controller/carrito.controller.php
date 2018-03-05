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
				$dir=$_POST['dir'];
				$cel=$_POST['cel'];
				$fecha=$_POST['fecha'];
				$ciudad=$_POST['ciudad'];
				$token = $this->doizer->randAlphanum(7)."-".$this->doizer->randAlphanum(7);
				if ($dir!= "" && $cel !="" ) {
					$diasDiferencia = $this->doizer->validateDate($fecha,"past");
					if ($diasDiferencia<=0) {
						echo json_encode("Por favor seleciona una fecha valida.");
						return ;
					}else{
						if ($this->doizer->onlyNumbers($cel)==false) {
							$result = $this->master->procedure->NRP("modificarDatosContacto",array($dir,$ciudad,$cel,$_SESSION['USER']['CODE']));
							if ($result==true) {
									$result= $this->master->insert("pedidos",array($_SESSION['USER']['CODE'],$ciudad,$dir,date("Y-m-d"),$fecha,$token),array("ped_codigo"));
									if ($result==true) {
										$orderCode = $this->master->selectBy("pedidos",array("token",$token))['ped_codigo'];
										foreach ($_SESSION['cart_item'] as $row) {
											$dataPro = $this->master->selectBy("producto",array("pro_nombre",$row['producto']))['pro_codigo'];
											$talla = $this->master->selectBy("talla",array("tal_talla",$row['talla']))['tal_codigo'];
											$color = $this->master->selectBy("color",array("col_color",$row['color']))['col_codigo'];
											$result = $this->master->insert("producto_pedido",array($orderCode,$dataPro,$row['cantidad'],$color,$talla));
											echo json_encode($result);
										}
										// echo json_encode($_SESSION['cart_item']);
									}else{
										echo json_encode($this->doizer->knowError($result));
									}
							}else{
								echo json_encode($this->doizer->knowError($result));
							}
						}else{
							echo json_encode("Carcateres no validos en el numero de telefono.");
						}
					}
				}else{
					echo json_encode("Por favor llenar los campos");
				}

		}
		function countItem(){
			if (isset($_SESSION['cart_item'])) {
				$total = count($_SESSION['cart_item']);
				echo json_encode($total);
			}else{
				echo json_encode(0);
			}
		}
	}
?>
