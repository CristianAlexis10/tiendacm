<?php
class LoginModel extends MasterModel{
      public function __CONSTRUCT(){
           try {
               $this->pdo=DataBase::closeDB();
               $this->pdo=DataBase::openDB();
               $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           } catch (PDOException $e) {
               die($e->getMessage());
           }
       }

       //PROCEDIMIENTOS
           public function consultaUsuarioAcceso($correo){
           try {
               $this->sql="call consultaUsuarioAcceso(?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute(array($correo));
               $result = $query->fetch(PDO::FETCH_BOTH);
           } catch (PDOException $e) {
               $result = $e->getMessage();
           }
           return $result;
       }

        public function consultaUsuarioByCorreo($correo){
           try {
               $this->sql="call consultaUsuarioByCorreo(?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute(array($correo));
               $result = $query->fetch(PDO::FETCH_BOTH);
           } catch (PDOException $e) {
               $result = $e->getMessage();
           }
           return $result;
       }

        public function crearAcceso($values){
           try {
               $this->sql="call crearAcceso(?,?,?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute($values);
               $result =  $query->errorInfo()[1];
               if ($result==null) {
                  $result = true;
               }
           } catch (Exception $e) {
               $result =  $query->errorInfo()[1];
           }
           return $result;
       }
}

?>
