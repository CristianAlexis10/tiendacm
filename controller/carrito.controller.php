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
			if (!isset($_SESSION['cart_item'])) {
				if ($data['cantidad']>=10) {
					$precio = 9999;
				}else{
					$precio = ($result['pro_precio']*$data['cantidad']);
				}
				$_SESSION['cart_item'][]=array("producto"=>$result['pro_nombre'],"cantidad"=>$data['cantidad'],"precio"=>$precio,"color"=>$color['col_color'],"talla"=>$talla['tal_talla'],"image"=>$result['pro_imagen']);
				echo json_encode(true);
			}else{
				foreach ($_SESSION['cart_item'] as $item) {
					if ($item['producto']==$result['pro_nombre'] && $item['color']==$color['col_color'] && $item['talla']==$talla['tal_talla'] ) {
						echo json_encode("Ya registraste este producto.");
						return;
					}
				}
				if ($data['cantidad']>=10) {
					$precio = 9999;
				}else{
					$precio = ($result['pro_precio']*$data['cantidad']);
				}
				$_SESSION['cart_item'][]=array("producto"=>$result['pro_nombre'],"cantidad"=>$data['cantidad'],"precio"=>$precio,"color"=>$color['col_color'],"talla"=>$talla['tal_talla'],"image"=>$result['pro_imagen']);
				echo json_encode(true);
			}

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
						if ($this->doizer->onlyNumbers($cel)==true) {
							$result = $this->master->procedure->NRP("modificarDatosContacto",array($dir,$ciudad,$cel,$_SESSION['USER']['CODE']));
							if ($result==true) {
								$totalPedido =0 ;
								foreach ($_SESSION['cart_item'] as $row) {
										$totalPedido = $totalPedido+$row['precio'];
								}
									$result= $this->master->insert("pedidos",array($_SESSION['USER']['CODE'],$ciudad,$dir,date("Y-m-d"),$fecha,$token,"Bodega",$totalPedido),array("ped_codigo"));
									if ($result==true) {
										$orderCode = $this->master->selectBy("pedidos",array("token",$token))['ped_codigo'];
										foreach ($_SESSION['cart_item'] as $row) {
											$dataPro = $this->master->selectBy("producto",array("pro_nombre",$row['producto']))['pro_codigo'];
											$talla = $this->master->selectBy("talla",array("tal_talla",$row['talla']))['tal_codigo'];
											$color = $this->master->selectBy("color",array("col_color",$row['color']))['col_codigo'];
											$result = $this->master->insert("producto_pedido",array($orderCode,$dataPro,$row['cantidad'],$color,$talla));
										}
										if ($result==true) {
											$_SESSION['new_ped_token'] = $token;
											unset($_SESSION['cart_item']);
											echo json_encode($result);
										}else{
											echo json_encode($this->doizer->knowError($result));
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
		function viewAllOrder(){
			if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1) {
		     	require_once("views/modules/admin/tienda/index.php");
			 }else{
				 header("Location:inicio");
			 }
		}
		function viewOrder(){
			if ($_SESSION['USER']['ROL']==1) {
				require_once("views/include/dashboard/header.php");
				require_once("views/modules/admin/tienda/view.php");
				require_once("views/include/dashboard/footer.php");
			}else{
					session_destroy();
					header("Location:inicio");
			}
		}
	}
?>
