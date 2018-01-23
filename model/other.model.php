<?php
class otherClass extends MasterModel{
      public function __CONSTRUCT(){
           try {
               $this->pdo=DataBase::closeDB();
               $this->pdo=DataBase::openDB();
               $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           } catch (PDOException $e) {
               die($e->getMessage());
           }
       }

      public function methodBasic(){
          return $this->selectAll("ciudad");
      }
}

?>
