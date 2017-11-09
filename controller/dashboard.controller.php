<?php
require_once ("model/tienda.model.php");
class DashboardController{
    public function mainPage(){
      require_once ("views/include/header.php");
      require_once ("views/modules/dashboard/index.php");
      require_once ("views/include/footer.php");
    }
}
?>
