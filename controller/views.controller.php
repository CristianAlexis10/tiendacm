<?php
class ViewsController{
	private $master;
	private $doizer;
	function __CONSTRUCT(){
		$this->master = new MasterModel;
		$this->doizer = new DoizerController;
	}
	function mainPage(){
		 require_once("views/include/usuario/header.php");
     require_once("views/modules/landing.php");
     require_once("views/include/usuario/footer.php");
	}


	function landin(){
		 require_once("views/include/usuario/header.php");
     		require_once("views/modules/landing.php");
		 require_once("views/include/usuario/footer.php");
	}
}
?>
