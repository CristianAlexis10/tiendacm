<?php

Class TiendaModel{
  private $pdo;

  public function __CONSTRUCT(){
    try {
      $this->pdo = DataBase::connect();
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die($e->getMessage()." ".$e->getLine()." ".$e->getFile());
    }
  }
   public function readTienda(){
       try {
         $sql="SELECT * FROM producto";
         $query = $this->pdo->prepare($sql);
         $query->execute();
         $result = $query->fetchALL(PDO::FETCH_BOTH);
       } catch (PDOException $e) {
           die($e->getMessage()."".$e->getLine()."".$e->getFile());
       }
       return $result;
   }
   public function createTienda(){
     try {
       $sql="INSERT INTO producto (pro_nompro, pro_img, pro_precio, pro_cant, pro_des) VALUES (?,?,?,?,?)";
       $query = $this->pdo->prepare($sql);
       $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4]));
       $msn = "Se creo un nuevo producto correctamente.";
     } catch (PDOException $e) {
       die($e->getMessage()."".$e->getLine()."".$e->getFile());
     }
   }
   
   public function __DESTRUCT(){
       DataBase::disconnect();
   }
}

 ?>
