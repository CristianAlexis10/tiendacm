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
                $_SESSION['blog']=$codigo;
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
    function save(){
      $data = $_POST['data'];
      $i=1;
      foreach ($data as $item ) {
        if (isset($item['type'])) {
          if ($item['type']=="title") {
                $result=$this->master->procedure->NRP("crearTitulo",array($item['conten'],$i,$_SESSION['blog'],"titulo"));
          }elseif($item['type']=="parrafo"){
              $result=$this->master->procedure->NRP("crearParrafo",array($item['conten'],$i,$_SESSION['blog'],"parrafo"));
          }elseif($item['type']=="parrafo2"){
              $result=$this->master->procedure->NRP("crearParrafo2",array("parrafo2",$item['conten1'],$item['conten2'],$i,$_SESSION['blog']));
          }elseif($item['type']=="img"){
            $result=$this->master->procedure->NRP("crearImg",array($i,$_SESSION['blog'],$item['conten'],"img"));
          }
          $i++;
        }
      }
      echo json_encode($result);
    }
    function delete(){
      $result = $this->master->delete("estructura_noticia",array("not_codigo",$_POST['data']));
      $result = $this->master->delete("noticia",array("not_codigo",$_POST['data']));
      echo json_encode($result);
    }
    function readNew(){
      $result = $this->master->selectBy("noticia",array("not_codigo",$_POST['data']));
      echo json_encode($result);
    }
    function update(){
      $img = $_POST['img'];
      $title = $_POST['title'];
      $des = $_POST['des'];
      $codigo= $_POST['codigo'];
      if ($img!="default") {
        if ($title!="") {
          if($des!=""){
            $data= $this->master->selectBy("noticia",array("not_codigo",$codigo));
            if ($img==$data['not_poster']) {
              $result = $this->master->procedure->NRP("editarNoticia",array($codigo,$title,$des,date("y-m-d")));
            }else{
              unlink("views/assets/img/news/".$data['not_poster']);
              $result = $this->master->procedure->NRP("editarNoticiaImg",array($codigo,$title,$des,$img,date("y-m-d")));
            }
              if ($result==true) {
                echo json_encode($result);
              }else{json_encode($this->doizer->knowError($result));}
          }else{echo json_encode("por favor inserta un pequeño resumen");}
        }else{echo json_encode("Por favor inserta el titulo de la noticia");}
      }else{echo json_encode("Por favor seleciona una  imagen");  }
    }
    function viewAll(){
      if (isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==1) {
        require_once("views/include/dashboard/header.php");
        require_once("views/modules/admin/news/detail.php");
        require_once("views/include/dashboard/footer.php");
      }elseif(isset($_SESSION['USER']['ROL']) && $_SESSION['USER']['ROL']==2) {
        require_once("views/include/customer/header.php");
        require_once("views/modules/customer/news/detail.php");
        require_once("views/include/customer/footer.php");
      }else{
        require_once("views/include/user/header.php");
        require_once("views/modules/user/news/detail.php");
        require_once("views/include/user/footer.php");
      }
    }
  }
?>
