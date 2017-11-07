<?php

require_once("model/tienda.model.php");
Class TiendaController{
  private $TiendaM;

  public function __CONSTRUCT(){
    $this->TiendaM = new TiendaModel();
  }

  public function mainPage(){
    $consulta = $this->TiendaM->readTienda();
    require_once("views/include/header.php");
    require_once("views/modules/tienda_mod/tienda.php");
    require_once("views/include/footer.php");
  }
}

 ?>
