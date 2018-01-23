<?php

Class TiendaController{
     private $master;
    private $doizer;
    function __CONSTRUCT(){
      $this->master =  MasterModel();
      $this->doizer = new DoizerController;
    }
    public function mainPage(){
      $consulta = $this->master->selectAll('producto');
      require_once "views/include/user/header.php";
      require_once "views/modules/user/tienda/tienda.php";
      require_once "views/include/user/footer.php";
    }
  function gestionar(){
    if (isset($_SESSION['USER']['ROL'])) {
      if ($_SESSION['USER']['ROL']==1) {
        require_once("views/include/dashboard/header.php");
        require_once("views/modules/admin/category/category.php");
        require_once("views/include/dashboard/footer.php");
      }else{
        require_once("views/include/user/header.php");
        require_once("views/modules/landing.php");
       require_once("views/include/user/footer.php");
      }
    }else{
      require_once("views/include/user/header.php");
      require_once("views/modules/landing.php");
     require_once("views/include/user/footer.php");
    }
  }
}
?>
