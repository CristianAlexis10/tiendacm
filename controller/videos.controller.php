<?php

Class VideosController{
  private $master;
  private $doizer;
  function __CONSTRUCT(){
    $this->master =  MasterModel();
    $this->doizer = new DoizerController;
  }
    public function mainPage(){
      if (isset($_SESSION['USER']['CODE'])) {
             require_once "views/include/customer/header.php";
             require_once "views/modules/customer/videos/index.php";
             require_once "views/include/customer/footer.php";
      }else{
        require_once "views/include/user/header.php";
        require_once "views/modules/user/videos/index.php";
        require_once "views/include/user/footer.php";

      }
    }

    function gestion(){
      require_once("views/include/dashboard/header.php");
      require_once("views/modules/admin/videos/index.php");
      require_once("views/include/dashboard/footer.php");
    }

    function upload(){
      print_r($_FILES);
    }
  }
?>
