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


}
?>
