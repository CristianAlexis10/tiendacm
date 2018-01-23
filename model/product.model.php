<?php
class ProductModel extends MasterModel{
      public function __CONSTRUCT(){
           try {
               $this->pdo=DataBase::closeDB();
               $this->pdo=DataBase::openDB();
               $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           } catch (PDOException $e) {
               die($e->getMessage());
           }
       }

       public function updaCate($values){
           try {
               $this->sql="UPDATE categoria SET cat_categ = ? , cat_estado = ? WHERE cat_codigo = ?";
               $query=$this->pdo->prepare($this->sql);
               $query->execute($values);
               $result = true;
           } catch (Exception $e) {
               $result = $e->getMessage();
           }
           return $result;
       }
       public function updaCateImg($values){
           try {
               $this->sql="UPDATE categoria SET cat_img = ?  WHERE cat_codigo = ?";
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
       //eliminar producto
        public function eliminarProducto($value){
           try {
               $this->sql="call eliminarProducto(?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute(array($value));
               $result =  $query->errorInfo()[1];
               if ($result==null) {
                  $result = true;
               }
           } catch (Exception $e) {
               $result =  $query->errorInfo()[1];
           }
           return $result;
       }
       //crear pproducto
        public function crearProducto($value){
           try {
               $this->sql="call crearProducto(?,?,?,?,?,?,?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute($value);
               $result =  $query->errorInfo()[1];
               if ($result==null) {
                  $result = true;
               }
           } catch (Exception $e) {
               $result =  $query->errorInfo()[1];
           }
           return $result;
       }
       //crear  color_producto
        public function color_producto($value){
           try {
               $this->sql="call color_producto(?,?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute($value);
               $result =  $query->errorInfo()[1];
               if ($result==null) {
                  $result = true;
               }
           } catch (Exception $e) {
               $result =  $query->errorInfo()[1];
           }
           return $result;
       }
       //crear  talla_producto
        public function talla_producto($value){
           try {
               $this->sql="call talla_producto(?,?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute($value);
               $result =  $query->errorInfo()[1];
               if ($result==null) {
                  $result = true;
               }
           } catch (Exception $e) {
               $result =  $query->errorInfo()[1];
           }
           return $result;
       }
       //crear  talla_producto
        public function updatePro($value){
           try {
               $this->sql="call updatePro(?,?,?,?,?,?,?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute($value);
               $result =  $query->errorInfo()[1];
               if ($result==null) {
                  $result = true;
               }
           } catch (Exception $e) {
               $result =  $query->errorInfo()[1];
           }
           return $result;
       }

      public function colores($col){
           try {
               $this->sql="call colores(?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute(array($col));
               $result = $query->fetchAll(PDO::FETCH_BOTH);
           } catch (PDOException $e) {
               $result = $e->getMessage();
           }
           return $result;
       }
        public function tallas($col){
           try {
               $this->sql="call tallas(?)";
               $query=$this->pdo->prepare($this->sql);
               $query->execute(array($col));
               $result = $query->fetchAll(PDO::FETCH_BOTH);
           } catch (PDOException $e) {
               $result = $e->getMessage();
           }
           return $result;
       }

}

?>
