<?php

Class TiendaController{
     private $master;
    private $doizer;
    function __CONSTRUCT(){
      $this->master = new MasterModel;
      $this->doizer = new DoizerController;
    }
  public function mainPage(){
    $consulta = $this->master->selectAll('producto');
    require_once("views/include/usuario/header.php");
    require_once("views/modules/tienda/tienda.php");
    require_once("views/include/usuario/footer.php");
  }
}
?>
