<?php

Class VideosController{
  private $master;
  private $doizer;
  function __CONSTRUCT(){
    $this->master =  MasterModel();
    $this->doizer = new DoizerController;
  }
    public function mainPage(){
      if (isset($_SESSION['USER']['CODE'])) {
             require_once "views/include/customer/header.php";
             require_once "views/modules/customer/videos/index.php";
             require_once "views/include/customer/footer.php";
      }else{
        require_once "views/include/user/header.php";
        require_once "views/modules/user/videos/index.php";
        require_once "views/include/user/footer.php";

      }
    }

    function gestion(){
      require_once("views/include/dashboard/header.php");
      require_once("views/modules/admin/videos/index.php");
      require_once("views/include/dashboard/footer.php");
    }

    function upload(){
      $archivo =  $_FILES["archivo1"];
      $subir = $this->doizer->validateVideo($archivo,"views/assets/video/");
      if (is_array($subir)) {
        $result = $this->master->insert("video",array($_POST['nombre'],$subir[1],$_SESSION['USER']['CODE']),array("id_video"));
        if ($result==true) {
            echo json_encode(true);
        }else{
          echo json_encode($this->doizer->knowError($result));
        }
      }else{
        echo json_encode("no");
      }
    }
    function delete(){
        $data = $this->master->selectBy("video",array("id_video",$_POST['data']));
        $result = $this->master->delete("video",array("id_video",$_POST['data']));
        if ($result==true) {
            unlink("views/assets/video/".$data['url']);
            echo json_encode($result);
        }else{
            echo json_encode($this->doizer->knowError($result));
        }
    }
  }
?>
