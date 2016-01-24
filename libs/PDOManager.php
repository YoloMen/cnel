<?php
class PDOManager extends PDO{
        
	public function __construct($DB_TYPE,$DB_HOST,$DB_USER,$DB_PASS,$DB_NAME)
	{
        $this->DB_TYPE= $DB_TYPE;
		$this->DB_HOST= $DB_HOST;
		$this->DB_USER= $DB_USER;
		$this->DB_PASS= $DB_PASS;
		$this->DB_NAME= $DB_NAME;
                
        try {
                parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME.';charset=utf8', $DB_USER, $DB_PASS);
          
        }catch (PDOException $e) {
		
			printf("Connect failed: ". $e->getMessage());
                       // $this=null;
			exit();
		}
	}
	
	function __destruct()
	{
            try 
            {
               // $this= null; //Closes connection
            }
            catch (PDOException $e) 
            {
                //file_put_contents("log/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: " . $e->getMessage().PHP_EOL, FILE_APPEND);
                die($e->getMessage());
            }
	}
	/**
	* SELECT
	*
	* @author Jaime Vilca - Jordy Piedra
	*
	* retorna el resultado de una query de tipo SELECT a una base de datos
	* MySQL.
	*
	* @param String $attr Atributo a seleccionar de la tabla
	* @param String $table Tabla de la que se selecciona
	* @param String $where condicional (opcional) de la selección
	* 
	* @return Array<String> $response / Error
	*/
	public function select($attr,$table,$where = '',$fetchMode = PDO::FETCH_ASSOC){
		$where = ($where != '' ||  $where != null) ? "WHERE ".$where : '';
		$sql = "SELECT ".$attr." FROM ".$table." ".$where.";";
		//echo $sql;
		$result = $this->prepare($sql);
                
        $result->execute();    
        return $result->fetchAll($fetchMode);
	}
	/**
	* INSERT
	*
	* @author Jaime Vilca - Jordy Piedra
	*
	* inserta registros enviados en formato INSERT a una base
	* de datos MySQL
	*
	* @param String $table Tabla en la que se insertarán los datos
	* @param Array $values Arreglo de datos a insertar ["NOMBRE_CAMPO" => ["VALUE" => VALUE, "TYPE"=PDO::TYPE]]	
	* @param Boolean $bind Condicional que determina si debe ser sanear(PDO) los parametros
	*
	* @return Boolean $response true/false
	*/
	function insert($table,$values, $bind = false){
                
        $columnas = null;
        $valores = null;

		if(!$bind){
			foreach ($values as $key => $value) {
				$columnas.=$key.",";
				$valores .= $value.",";
			}
		}else{
			foreach ($values as $key => $value) {
				$columnas.=$key.",";
				$valores .= ":".$key.",";
			}
		}

		$columnas=substr($columnas, 0, -1);
		$valores =substr($valores, 0, -1);


		$sql = "INSERT INTO ".$table." (".$columnas.") VALUES(".$valores.");";
		//echo "$sql";
		$result = $this->prepare($sql);

		if($bind){
			foreach ($values as $key => $value) {
				$result->bindValue(":".$key, $value["value"], $value["type"]);
				//echo "key= :".$key." value=".$value["value"]." type=".$value["type"]."\n";
			}
		}

		return $result->execute();

		/*if($result->execute();){
			if ($result->rowCount() > 0){
				return $result->rowCount();
			}
		}else{
			echo $result->errorInfo();
			echo 'FAIL';
			//return false;
		}*/

	}
	/**
	* UPDATE
	*
	* @author Jaime Vilca - Jordy Piedra
	*
	* Actualiza registros en la tabla deseada mediante una String en formato
	* Update Query de MySQL
	*
	* @param String $table Tabla de la base de datos
	* @param Array<String> $values Valores ordenados en formato [attr] = value  
	* @param Boolean $aud especifica los campos de auditoria (Creación || Modificación)
	* @param String $where Sentencia where
	* @param Boolean $bind Enlaza los parámetros [attr = :attr]
	* @param Boolean $returnSQL retorna Sentencia SQL
	*
	* @return Boolean $response
	*/
	function update($table, $values, $aud = false, $where , $bind = false, $returnSQL = false){       
        $subStmt = null;
      
		if(!$bind){
			foreach ($values as $key => $value) {
				$subStmt.=$key.' = '.$value.', ';
			}
		}else{
			foreach ($values as $key => $value) {
				$subStmt.=$key.' = :'.$key.', ';
			}
		}

		if($aud){
			$subStmt.= $aud;
		}else{
			$subStmt = substr($subStmt, 0, -2);
		}
				
		$sql = "UPDATE $table SET $subStmt WHERE $where ;";

		if($returnSQL)
			return $sql;
		
		$result = $this->prepare($sql);
		
		if($bind){
			foreach ($values as $key => $value) {
				$result->bindValue(":".$key, $value["value"], $value["type"]);
				//echo "key= :$key ________ value: ".$value["value"]." \n";
			}
		}

		$result->execute();
		if ($result->rowCount() > 0){
			return true;
		}else{
			return false;
		}	

		/*if($result->execute()){
			if ($result->rowCount() > 0)
				return $result->rowCount();
		}else{
			echo $result->errorInfo();
			echo 'FAIL';
		}*/

	}
	/**
	* DELETE
	*
	* @author Jaime Vilca - Jordy Piedra
	*
	* Eliminar registros en la tabla deseada mediante una String en formato
	* Update Query de MySQL
	*
	* @param String $table Tabla de la base de datos
	* @param Array<String>/String $values Valores ordenados en formato [attr] = value
	*								      o en otro caso sentencia  
	* @param Boolean $complex Indica si se usará $values como string o como arreglo
	*
	* @return Boolean $response
	*/
	function delete($table, $where = false){
		if(!$where){
			return false;
		}

		$sql = "DELETE FROM $table WHERE $where";

		$query = $this->prepare($sql);
		$query->execute();

		if ($query->rowCount() > 0) {
		  return true;
		}

		return false;


	}
	/**
	* CHECK
	*
	* @author Jaime Vilca - Jordy Piedra
	*
	* Checar la existencia de un registro en la base de datos
	*
	* @param String $attr Atributo(s) a checkear
	* @param String $table Tabla de la base de datos
	* @param String $where Condición de la consulta
	*
	* @return Boolean $response
	*/
	function check($attr,$table,$where = ''){
		$where = ($where != '' ||  $where != null) ? "WHERE ".$where : '';
		$sql = "SELECT ".$attr." FROM ".$table." ".$where.";";
		$result = $this->prepare($sql);
	
		if($result->execute()){
	       if ($result->rowCount() > 0)
	        	return true;
	       else
	        	return false;
	   }else{
	           echo $result->errorInfo();
	           echo 'FAIL';
	           //return false;
	   }
	}

	function startTransaction ($SQLs){
		try {   
		    $this->beginTransaction();

		   for ($i=0; $i < count($SQLs); $i++) { 
			$result = $dbh->prepare($SQLs[$i]);
			$result->execute();
		   }

		    $this->commit();

		} catch(PDOException $e) {
		     $this->rollBack();
		     var_dump($e);
		}
	}
        
}
?>