<?php

// require_once("model/tienda.model.php");
Class NewsController{
    private $TiendaM;
    public function __CONSTRUCT(){
      // $this->TiendaM = new TiendaModel();
    }
    public function mainPage(){
             require_once("views/include/header.php");
             require_once("views/modules/news/index.php");
             require_once("views/include/footer.php");
    }
  }
?>
