<?php
Class OrdersController{
     private $master;
    private $doizer;
    function __CONSTRUCT(){
      $this->master = new MasterModel;
      $this->doizer = new DoizerController;
    }

 function newOrder(){
    $data = $_POST['data'];
    $i = 0;
    $pedido=array();
    foreach ($data as $key) {
        if (isset($data[$i]['pro_codigo'])) {
            // crear un arreglo asociativo php
            $pedido[]=array('pro_cod'=>$data[$i]['pro_codigo'],'cantidad'=>$data[$i]['cant'],'color'=>$data[$i]['color']);
        }
        $i++;
    }
    // Array ( [0] => Array ( [pro_cod] => 3 [cantidad] => 0 [color] => blanco ) )

    //ACA HACER LA VUELTA PARA ENVIARLO A LA DB
    // $pro = '';
  $this->master->insert('pedidos',array('1','DIR',date('Y-m-d')),array('ped_codigo'));
  $cod_ped = $this->master->selectMaxBy('pedidos','ped_codigo',array('usu_id',1));
    foreach ($pedido as $row) {
      $this->master->insert('producto_pedido',array($cod_ped[0],$row['pro_cod'],$row['cantidad']));
      // $pro .= $row['pro_cod'];
    }
    echo json_encode($cod_ped[0]);
  }


}
?>
