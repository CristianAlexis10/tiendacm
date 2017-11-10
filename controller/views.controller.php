<?php
class ViewsController{
	function mainPage(){
		 require_once("views/include/header.php");
     require_once("views/modules/landing.php");
     require_once("views/include/footer.php");
	}

	function dashboard(){
		 require_once("views/include/header.php");
     require_once("views/modules/dashboard/index.php");
     require_once("views/include/footer.php");
	}
	function landin(){
     require_once("views/modules/landing.php");
	}
}
?>
