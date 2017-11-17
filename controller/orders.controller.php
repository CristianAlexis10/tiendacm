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
            echo json_encode($data[$i]['cantidades']);
            // $pedido[]=array('pro_cod'=>$data[$i]['pro_codigo']);
        }
        $i++;
    }
    // echo json_encode($pedidos);


// $_SESSION['nn']=$data;
// Array ( [0] => [1] => Array ( [pro_codigo] => 1 [cantidades] => Array ( [0] => 0 [1] => 1 ) [colores] => Array ( [0] => blanco [1] => rojo ) [pro_talla] => Array ( [0] => m [1] => x ) ) )










    // foreach ($data as $key) {
    //     if (isset($data[$i]['pro_codigo'])) {
    //         // crear un arreglo asociativo php
    //         $pedido[]=array('pro_cod'=>$data[$i]['pro_codigo'],'cantidad'=>$data[$i]['cant'],'color'=>$data[$i]['color']);
    //     }
    //     $i++;
    // }
    // Array ( [0] => Array ( [pro_cod] => 3 [cantidad] => 0 [color] => blanco ) )

    //ACA HACER LA VUELTA PARA ENVIARLO A LA DB
    // $pro = '';
  // $this->master->insert('pedidos',array('1','DIR',date('Y-m-d')),array('ped_codigo'));
  // $cod_ped = $this->master->selectMaxBy('pedidos','ped_codigo',array('usu_id',1));
  //   foreach ($pedido as $row) {
  //     $this->master->insert('producto_pedido',array($cod_ped[0],$row['pro_cod'],$row['cantidad']));
  //     // $pro .= $row['pro_cod'];
  //   }
  //   echo json_encode($cod_ped[0]);
  }


}
?>
