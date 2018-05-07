<?php
Class OrdersController{
     private $master;
    private $doizer;
    function __CONSTRUCT(){
      $this->master =  MasterModel();
      $this->doizer = new DoizerController;
    }

 function newOrder(){
    $data = $_POST['data'];
    $i = 0;
    $pedido=array();

      foreach ($data as $indice) {
         if (isset($data[$i]['pro_codigo'])) {
            $pedido[] = $indice;
          }
          $i++;
      }
      $num_pro = count($pedido)-1;
      $inicio = 0;

      //insertar en pedidos
  $this->master->insert('pedidos',array('1','DIR',date('Y-m-d')),array('ped_codigo'));
  //obtener la id del pedidos
  $cod_ped = $this->master->selectMaxBy('pedidos','ped_codigo',array('usu_id',1));

      while( $inicio <= $num_pro){
        //obtener el codigo de cada producto
               $pro_cod_insert =  $pedido[$inicio]['pro_codigo'];
                //entrar en los detalles de cada producto
            foreach ($pedido[$inicio]['detalles'] as $row) {
              //insertar el codigo del producto con sus carracteriisticas
              $result = $this->master->insert('producto_pedido',array($cod_ped[0],$pro_cod_insert,$row['cantidad'],$row['color'],$row['talla']));
                 // echo $row['cantidad'];
                 // echo $row['color'];
                 // echo $row['talla'];
            }
        $inicio++;

      }
      echo json_encode($result);


  }
  function delete(){
    $res = $this->master->selectBy("pedidos",array("ped_codigo",$_POST['data']));
    $data = $this->master->procedure->PRByAll("verDetallesPedido",array($res['token']));
    $cabeceras= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // mail($data[0]['usu_correo'], "Tu pedido ha sido eliminado", "El pedido con el codigo ".$res['token']." ha sido eliminado.", $cabeceras);
    $result = $this->master->procedure->NRP("eliminarPedido",array($_POST['data']));
    if ($result==true) {
      echo json_encode($result);
    }else{
      echo json_encode($this->doizer->knowError($result));
    }
  }
  function update(){
    $res = $this->master->selectBy("pedidos",array("ped_codigo",$_SESSION['ped']));
    $data = $this->master->procedure->PRByAll("verDetallesPedido",array($res['token']));
    $cabeceras= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $result = $this->master->procedure->NRP("modificarPedido",array($_SESSION['ped'],$_POST['estado']));
    // mail($data[0]['usu_correo'], "Estado de tu pedido", "tu pedido ahora esta  ".$res['estado'], $cabeceras);
    if ($result==true) {
      echo json_encode($result);
    }else{
      echo json_encode($this->doizer->knowError($result));
    }
  }
  function preview(){
    $data = $this->master->selectBy("pedidos",array("ped_codigo",$_POST['data']));
       $data = $this->master->procedure->PRByAll("verDetallesPedido",array($data['token']));
       $result ;
        foreach ($data as $row) {
            $result[]= array("nombre"=>$row['pro_nombre'],"color"=>$row['col_color'],"talla"=>$row['tal_talla'],"cant"=>$row['cantidad']);
       }
       echo json_encode($result);
  }

}
?>
