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
          // require_once("views/include/dashboard/footer.php");
				}else{
					header("Location: catalogo");
				}
			}else{
				header("Location: catalogo");
			}
    }

    function newRegister(){
      $img = $_POST['img'];
      $title = $_POST['title'];
      $des = $_POST['des'];
      if ($img!="default") {
        if ($title!="") {
          if($des!=""){
            $codigo = $this->doizer->randAlphanum(20);
              $result = $this->master->insert("noticia",array($codigo,$_SESSION['USER']['CODE'],$title,$des,$img,date("y-m-d")));
              if ($result==true) {
                echo json_encode($result);
              }else{json_encode($this->doizer->knowError($result));}
          }else{echo json_encode("por favor inserta un pequeño resumen");}
        }else{echo json_encode("Por favor inserta el titulo de la noticia");}
      }else{echo json_encode("Por favor seleciona una  imagen");  }
    }
    function createStructure(){
      require_once("views/include/dashboard/header.php");
      require_once("views/modules/admin/news/structure.php");
    }

    function upload(){
      $archivo =  $_FILES["archivo1"];
      $subir = $this->doizer->validateNoticia($archivo,"views/assets/img/news/");
      if (is_array($subir)) {
        $_SESSION['ar'] =$subir[1];
        echo json_encode(array(true,$_SESSION['ar']));
      }else{echo josn_encodo("no");}
    }
    function view(){
      require_once("views/include/user/header.php");
      require_once("views/modules/user/news/detail.php");
      require_once("views/include/user/footer.php");
    }
  }
?>
