<?php
/*
@user: Cristian Lopera
@dateCreate:20/06/2017
@nameMethod:comodines
@description:este metodo se encarga de posicionar y retornar  los comodiines(?) necesarios para preparar la petiicion sql.
@params: $comodines->arreglo que contiene el numero  de cada columnas  que se utilizaran en la peticion

@nameMethod:values
@description:este metodo se encarga de posicionar y retornar  las varibles necesarios para preparar la petiicion sql.
@params: $values->arreglo que contiene las variables que participan en la peticion sql.


@nameMethod:columnsUpdate
@description:este metodo se encarga de posicionar y retornar  las columnas que participan en un UPDATE  con su respectivo comodin(?)
@params: $columns->string que contiene los nombres de las columnas que participan en la peticion sql.



@nameMethod:insert
@description:este metodo se encarga de insertar datos en BD,recibe 3 parametros insert(string,array,array) siendo el primero el nombre de la tabla, el segundo los  valores a insertar y el tercero que es opcional el nombre de las columnas que no participan en la insercion

@nameMethod:selectAll
@description:este metodo se encarga de consultar  datos en BD,recibe el nombre de la tabla

@nameMethod:selectBy
@description:este metodo se encarga de consultar  datos en BD,recibe 2 parametros selectBy(string,array) siendo el primero el nombre de la tabla, el segundo  en la primera posicion del arreglo el nombre de la columna y el segundo el valor a comparar

@nameMethod:update
@description:este metodo se encarga de actualizar  datos en BD,4 parametros update(string,array,array,array) siendo el primero el nombre de la tabla, el segundo  en la primera posicion del arreglo el nombre de la columna para generar el WHERE y en la segunda posicion el valor ,el tercero parametro los valores a actualizar ,el cuarto como  parametro opcional contiene los nombres de las columnas que no se quieren ver afectadas en el update, retorna true o error

@nameMethod:delete
@description:este metodo se encarga de eliminar  datos en BD, 2 parametros delete(string,array) el primero el nombre de la tabla  el segundo en la primera posicion la primary key y el segundo eel valor  retorna true o el error

@nameMethod:innerJoinAllBy
@description:este metodo se encarga de consultar  datos en BD, 3 parametros innerJoin(array,array,array) en el primer  arreglo se reciben el nombre de las dos tablas que queremos que se realize la consulta,el segundo  arreglo lleva el nombre de los capos de referencia de cada tabla


@nameMethod:innerJoinBy  nnerJoinBy($tables,$equals,$condition){
@description:este metodo se encarga de consultar  datos en BD, 3 parametros innerJoin(array,array,array) en el primer  arreglo se reciben el nombre de las dos tablas que queremos que se realize la consulta,el segundo  arreglo lleva el nombre de los capos de referencia de cada tabla y en el tercer arreglo en la primera posicion  tabla.columna con que se realizara el WHERE y en la segunda el valor


@dataUpdate:
@userUpdate:
*/
class MasterModel{
    private $pdo;
    private $sql;
    //acceso a conexion de base de datos
    public function __CONSTRUCT(){
        try {
            $this->pdo=DataBase::openDB();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    function columnsOfTable($table,$skip = null){
         try {
            $dbname= DataBase::getName();
            $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table'  AND table_schema = '$dbname'";
            $query=$this->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_BOTH);
            $columns=" ";
            $i=0;
            foreach ($result as $row) {
                if ($row[0]==$skip[$i]) {
                    if ($i<(count($skip)-1)) {
                       $i++;
                    }
                }else{
                    $columns.=$row[0].",";
                }
            }
            $result=$columns;
            $result = substr($result, 0, -1);
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    //saber el numero de  comodines
    public function comodines($comodines){
        $resultComodines="";
        foreach ($comodines as $como) {
            $resultComodines.="?,";
        }
        $resultComodines = substr($resultComodines, 0, -1);
        return $resultComodines;
    }
    //saber los valores
    public function values($valores){
        $i=0;
         // $resultado = count($valores);
         $resultValues="";
        foreach ($valores as $value) {
            $resultValues.= $value.",";
            $i=$i+1;
        }
        $resultValues = substr($resultValues, 0, -1);
        return $resultValues;
    }
    //acomodar las columnas y los valores al hacer un update
    public function columnsUpdate($columns){
        $columns = explode(",",$columns);
        $resultColomnsUpdate="";
        foreach ($columns as $col) {
            $resultColomnsUpdate.= $col." = ? , ";
        }
        $resultColomnsUpdate = substr($resultColomnsUpdate, 0, -2);
        return $resultColomnsUpdate;
    }

    //insertar en una tabla
    public function insert($table,$values,$exeption = null){
        try {
            $cols=$this->columnsOfTable($table,$exeption);
            $comodines=$this->comodines($values);
            //convertir en string
            $vals=$this->values($values);
            $vals = explode(",",$vals);
            $this->sql="INSERT INTO $table($cols) VALUES ($comodines)";
            // die($this->sql);
            $query=$this->pdo->prepare($this->sql);
            $query->execute($vals);
            $result = true;
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }
       return $result;
    }
    //CONSULTA GENERAL
    public function selectAll($table){
        try {
            $this->sql="SELECT * FROM $table";
            $query=$this->pdo->prepare($this->sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_BOTH);
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }

        return $result;
    }
    public function selectAllBy($table,$condition){
        try {
            $this->sql="SELECT * FROM $table WHERE $condition[0] = ?";
            $query=$this->pdo->prepare($this->sql);
            $query->execute(array($condition[1]));
            $result = $query->fetchAll(PDO::FETCH_BOTH);
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }

        return $result;
    }
    //MININO REGISTRO
    public function selectMin($table,$colum){
        try {
            $this->sql="SELECT min($colum) FROM $table";
            $query=$this->pdo->prepare($this->sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_BOTH);
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }

        return $result;
    }
  //CONTAR REGISTRO
    public function selectCount($table,$colum,$condition){
        try {
            $this->sql="SELECT count($colum) FROM $table WHERE $colum = ?";
            $query=$this->pdo->prepare($this->sql);
            $query->execute(array($condition));
            $result = $query->fetch(PDO::FETCH_BOTH);
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }

        return $result;
    }
    //MAXIMO REGISTRO
    public function selectMax($table,$colum){
        try {
            $this->sql="SELECT max($colum) FROM $table";
            $query=$this->pdo->prepare($this->sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_BOTH);
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    public function selectBy($table,$condition){
        try {
            $vals=$this->values($condition);
            $vals = explode(",",$vals);
            $this->sql="SELECT * FROM $table WHERE $vals[0] = ?";
            $query=$this->pdo->prepare($this->sql);
            $query->execute(array($vals[1]));
            $result = $query->fetch(PDO::FETCH_BOTH);
        } catch (PDOException $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
    //ACTUALIZAR
    public function update($table,$colCondition,$values,$exeption = null,$die = null){
        try {
            $columns=$this->columnsOfTable($table,$exeption);
            $cols=$this->columnsUpdate($columns);
            $vals=$this->values($values);
            //para evitar sql inyection agregar el valor de la columna en el arreglo vals para generar otra posicion
            $vals.=",".$colCondition[1];
            //convertir en string
            $vals = explode(",",$vals);
            $this->sql="UPDATE $table SET $cols WHERE  $colCondition[0] = ? ";
            if ($die!=null) {
                      die($this->sql);
            }
            $query=$this->pdo->prepare($this->sql);
            $query->execute($vals);
            $result = true;
        } catch (PDOException $e) {
            $result =$e->getMessage();
        }
         return $result;
    }
    //modificar pocos Campos
    public function updateMin($table,$columns,$colCondition,$values){
       try {
           $cols=$this->columnsUpdate($columns);
           $vals=$this->values($values);
           //para evitar sql inyection agregar el valor de la columna en el arreglo vals para generar otra posicion
           $vals.=",".$colCondition[1];
           //convertir en string
           $vals = explode(",",$vals);
           $this->sql="UPDATE $table SET $cols WHERE  $colCondition[0] = ? ";
           $query=$this->pdo->prepare($this->sql);
           $query->execute($vals);
           $result = true;
       } catch (PDOException $e) {
           $result =$e->getMessage();
       }
        return $result;
   }
    public function delete($table,$condition){
        try {
            $vals=$this->values($condition);
            $vals = explode(",",$vals);
            $this->sql="DELETE  FROM $table WHERE $vals[0] = ?";
            $query=$this->pdo->prepare($this->sql);
            $query->execute(array($vals[1]));
            $result = true;
        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
    //INNER JOIN
     public function innerJoinBy($tables,$equals,$condition){
        try {
            $this->sql="SELECT  $tables[0].*,$tables[1].* FROM $tables[0] INNER JOIN $tables[1] ON $tables[0].$equals[0]=$tables[1].$equals[1] WHERE $condition[0] = $condition[1] ";
            $query=$this->pdo->prepare($this->sql);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_BOTH);;
        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
     public function innerJoinAllBy3($tables,$equals,$condition){
        try {
            $this->sql="SELECT  $tables[0].*,$tables[1].*,$tables[2].* FROM $tables[0] INNER JOIN $tables[1] ON $tables[0].$equals[0]=$tables[1].$equals[1] INNER JOIN $tables[2] ON $tables[2].$equals[2] =$tables[1].$equals[2]  WHERE $condition[0] = $condition[1] ";
            $query=$this->pdo->prepare($this->sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_BOTH);;
        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }

      public function moduleSecurity($condition){
        try {
            $this->sql="SELECT  tipo_usuario.*,permiso.*,modulos.* FROM tipo_usuario INNER JOIN permiso ON tipo_usuario.tip_usu_codigo=permiso.tip_usu_codigo INNER JOIN modulos ON permiso.id_modulo =modulos.id_modulo WHERE permiso.tip_usu_codigo=?";
            $query=$this->pdo->prepare($this->sql);
            $query->execute(array($condition));
            $result = $query->fetchAll(PDO::FETCH_BOTH);;
        } catch (Exception $e) {
            $result = $e->getMessage();
        }
        return $result;
    }
}

 ?>
