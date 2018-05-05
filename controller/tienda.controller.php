<?php

Class TiendaController{
     private $master;
    private $doizer;
    function __CONSTRUCT(){
      $this->master =  MasterModel();
      $this->doizer = new DoizerController;
    }
    public function mainPage(){
        if (isset($_GET['categoria'])) {
          if (isset($_SESSION['USER']['ROL'])) {
            if ($_SESSION['USER']['ROL']==1) {
              require_once("views/include/dashboard/header.php");
              require_once("views/modules/admin/products/new.productos.php");
              require_once("views/include/dashboard/footer.php");
    				}else{
              require_once "views/include/customer/header.php";
              require_once "views/modules/customer/tienda/products-category.php";
              require_once "views/include/customer/footer.php";
            }
          }else{
            require_once "views/include/user/header.php";
            require_once "views/modules/user/tienda/products-category.php";
            require_once "views/include/user/footer.php";
          }
        }else{
          if (isset($_SESSION['USER']['ROL'])) {
            if ($_SESSION['USER']['ROL']==1) {
              require_once("views/include/dashboard/header.php");
              require_once("views/modules/admin/products/new.productos.php");
              require_once("views/include/dashboard/footer.php");
    				}else{
              require_once "views/include/customer/header.php";
              require_once "views/modules/customer/tienda/tienda.php";
              require_once "views/include/customer/footer.php";
            }
        }else{
          require_once "views/include/user/header.php";
          require_once "views/modules/user/tienda/tienda.php";
          require_once "views/include/user/footer.php";
        }
    }
  }
  function gestionar(){
    if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1) {
        require_once("views/include/dashboard/header.php");
        require_once("views/modules/admin/category/category.php");
        require_once("views/include/dashboard/footer.php");
      }else{
      header("Location:inicio");
    }
  }

  function readImg(){
    $imgs = $this->master->selectAllBy("por_imagenes",array("pro_codigo",$_POST['data']));
    echo json_encode($imgs);
  }
}
?>
