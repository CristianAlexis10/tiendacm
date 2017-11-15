<?php

// require_once("model/tienda.model.php");
Class VideosController{
    private $master;
    private $doizer;
    public function __CONSTRUCT(){
      // $this->TiendaM = new TiendaModel();
    }
    public function mainPage(){
             require_once "views/include/usuario/header.php";
             require_once "views/modules/videos/index.php";
             require_once "views/include/usuario/footer.php";  
    }
  }
?>
