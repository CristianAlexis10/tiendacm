<?php
class ViewsController{
	private $master;
	private $doizer;
	function __CONSTRUCT(){
		$this->master =  MasterModel();
		$this->doizer = new DoizerController;
	}
	function mainPage(){
		if (isset($_SESSION['USER']['ROL'])) {
			if ($_SESSION['USER']['ROL']==1) {
				require_once("views/include/dashboard/header.php");
				require_once("views/modules/admin/index.php");
				require_once("views/include/dashboard/footer.php");
			}else{
				require_once "views/include/customer/header.php";
				require_once "views/modules/customer/landing.php";
				require_once "views/include/customer/footer.php";
			}
		}else{
			require_once "views/include/user/header.php";
			require_once "views/modules/landing.php";
			require_once "views/include/user/footer.php";
		}
	}


}
?>
