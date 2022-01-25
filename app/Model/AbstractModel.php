<?php
namespace SCANDIWEB\Model;
use SCANDIWEB\Lib\Database\MysqldbHandler;
use SCANDIWEB\Model\ProductModel\ProductModel;
class AbstractModel {
    const DATA_TYPE_BOOL = \PDO::PARAM_BOOL;
    const DATA_TYPE_STR = \PDO::PARAM_STR;
    const DATA_TYPE_INT = \PDO::PARAM_INT;
    const DATA_TYPE_DECIMAL = 4;
    const DATA_TYPE_DATE = 5;
    
    protected $_data = [];
    private function prepareValues(\PDOStatement &$stmt){
        foreach (static::$tableSchema as $columnName =>$type){
            if($type == 4){
                $filterDecimal = filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(':'.$columnName.'',$filterDecimal);
            }  else {
                $stmt->bindValue(':'.$columnName.'', $this->$columnName, $type);
            }
        }
    }
    private function prepareValuesParent(\PDOStatement &$stmt){
        
        foreach (static::getParentTableSchema() as $columnName =>$type){
            if($type == 4){
                $filterDecimal = filter_var($this->$columnName, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(':'.$columnName.'',$filterDecimal);
            }  else {
                $stmt->bindValue(':'.$columnName.'', $this->$columnName, $type);
            }
        }
    }
    private static function buildNameParamsSQL(){
        $namesParams = '';
        foreach (static::$tableSchema as $columnName => $type){
            $namesParams .= $columnName. ' = :' .$columnName . ',' ;
        }
        return trim($namesParams, ',');
    }
    private static function getParentNameParamsSQL(){
        $namesParams = '';
        foreach (static::getParentTableSchema() as $columnName => $type){
            $namesParams .= $columnName. ' = :' .$columnName . ',' ;
        }
        return trim($namesParams, ',');
    }  
    public  function CreateProducts() {
        MysqldbHandler::connect()->beginTransaction();
        $sqlstmt = "INSERT INTO ". static::getParentTableName() . ' SET '. self::getParentNameParamsSQL() . ";";
        $sqlstmt = MysqldbHandler::connect()->prepare($sqlstmt);
        $this->prepareValuesParent($sqlstmt);
        
        
        if($sqlstmt->execute()){
            $id = MysqldbHandler::connect()->lastInsertId();
            $this->setID($id);
            $sqlType = "INSERT INTO ". static::$tableName . ' SET ' . self::buildNameParamsSQL() . ";";
            $sqlType = MysqldbHandler::connect()->prepare($sqlType);
            $this->prepareValues($sqlType);
            if ($sqlType->execute()) {
                MysqldbHandler::connect()->commit();
                return true;
            } else {
                // rollback the transaction
	        MysqldbHandler::connect()->rollBack();
                return FALSE;
            }
            
        }
        return FALSE;
    }
    public function deleteAll($ids){
        $sql = 'DELETE FROM '.static::$tableName. ' WHERE id IN ('. $ids .');';
        $stmt = MysqldbHandler::connect()->prepare($sql);
        return $stmt->execute();
    }
     public static function getAll()
    {
        $sql = 'SELECT * FROM ' . static::$tableName;
        $stmt = DatabaseHandler::factory()->prepare($sql);
        $stmt->execute();
        if(method_exists(get_called_class(), '__construct')) {
            $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        } else {
            $results = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
        }
        if ((is_array($results) && !empty($results))) {
            return new \ArrayIterator($results);
        };
        return false;
    }
    public static function get($sql, $options = array()){
        $stmt = MysqldbHandler::connect()->prepare($sql);
        if (!empty($options)) {
            foreach ($options as $columnName => $type) {
                if ($type[0] == 4) {
                    $sanitizedValue = filter_var($type[1], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $stmt->bindValue(":{$columnName}", $sanitizedValue);
                } elseif ($type[0] == 5) {
                    if (!preg_match(self::VALIDATE_DATE_STRING, $type[1]) || !preg_match(self::VALIDATE_DATE_NUMERIC, $type[1])) {
                        $stmt->bindValue(":{$columnName}", self::DEFAULT_MYSQL_DATE);
                        continue;
                    }
                    $stmt->bindValue(":{$columnName}", $type[1]);
                } else {
                    $stmt->bindValue(":{$columnName}", $type[1], $type[0]);
                }
            }
        }
        $stmt->execute();
        if(method_exists(get_called_class(), '__construct')) {
            $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, get_called_class(), array_keys(static::$tableSchema));
        } else {
            $results = $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
        }
        if ((is_array($results) && !empty($results))) {
            return new \ArrayIterator($results);
        };
        return false;
    }
    ///return the table name
   public static function getModelTableName(){
      return static::$tableName;
    }
}
    