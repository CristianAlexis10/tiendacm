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
  }

  function gestionar(){
    if (isset($_SESSION['USER']['ROL'])) {
      if ($_SESSION['USER']['ROL']==1) {
        require_once("views/include/dashboard/header.php");
        require_once("views/modules/dashboard/store/gestiontienda.php");
        require_once("views/include/dashboard/footer.php");
      }else{
        require_once("views/include/usuario/header.php");
        require_once("views/modules/landing.php");
       require_once("views/include/usuario/footer.php");
      }
    }else{
      require_once("views/include/usuario/header.php");
      require_once("views/modules/landing.php");
     require_once("views/include/usuario/footer.php");
    }
  }
}
?>
