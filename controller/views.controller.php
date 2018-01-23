<?php
class ViewsController{
	private $master;
	private $doizer;
	function __CONSTRUCT(){
		$this->master =  MasterModel();
		$this->doizer = new DoizerController;
	}
	function mainPage(){
		if (isset($_SESSION['USER']['CODE'])) {
			require_once "views/include/customer/header.php";
			require_once "views/modules/landing.php";
			require_once "views/include/customer/footer.php";
		}else{
			require_once "views/include/user/header.php";
			require_once "views/modules/landing.php";
			require_once "views/include/user/footer.php";
		}
	}


}
?>
