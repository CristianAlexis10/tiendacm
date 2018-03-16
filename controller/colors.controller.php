<?php

Class ColorsController{
  private $master;
  private $doizer;
  function __CONSTRUCT(){
    $this->master =  MasterModel();
    $this->doizer = new DoizerController;
  }

  function newRegister(){
      if (!preg_match('`[a-zA-Z]`',$_POST['data'])){
          echo json_encode("campo  vacio");
          return;
      }
      $result = $this->master->insert("color",array($_POST['data']),array('col_codigo'));
      if ($result==true) {
          echo json_encode($result);
      }else{
          echo json_encode($this->doizer->knowError($result));
      }
  }
  function newRegisterTalla(){
      if (!preg_match('`[a-zA-Z]`',$_POST['data'])){
          echo json_encode("campo  vacio");
          return;
      }
      $result = $this->master->insert("talla",array($_POST['data']),array('tal_codigo'));
      if ($result==true) {
          echo json_encode($result);
      }else{
          echo json_encode($this->doizer->knowError($result));
      }
  }

  }
?>
