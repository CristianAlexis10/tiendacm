<?php

// require_once("model/tienda.model.php");
Class NewsController{
  private $master;
  private $doizer;
  function __CONSTRUCT(){
    $this->master =  MasterModel();
    $this->doizer = new DoizerController;
  }
    public function mainPage(){
      if (isset($_SESSION['USER']['CODE'])) {
             require_once("views/include/customer/header.php");
             require_once("views/modules/customer/news/index.php");
             require_once("views/include/customer/footer.php");
      }else{
        require_once("views/include/user/header.php");
        require_once("views/modules/user/news/index.php");
        require_once("views/include/user/footer.php");
      }
    }

    function gestion(){
      if (isset($_SESSION['USER']['ROL'])) {
				if ($_SESSION['USER']['ROL']==1) {
          require_once("views/include/dashboard/header.php");
          require_once("views/modules/admin/news/index.php");
          require_once("views/include/dashboard/footer.php");
				}else{
					header("Location: catalogo");
				}
			}else{
				header("Location: catalogo");
			}
    }
  }
?>
