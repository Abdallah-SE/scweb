<?php
namespace SCANDIWEB\Model\ProductModel;
use SCANDIWEB\Model\ProductModel\ProductModel;
class ProductBookModel extends ProductModel {
    
    protected $product_type = 'Book';
    protected $weight;
    protected $id;
   
    public static $tableName = 'book';
    protected static $primaryKey = 'id';
    public function __construct() {
        //$this->getProductProperties();
    }
    public static $tableSchema = array(
        'product_type'       =>self::DATA_TYPE_STR,
        'weight'             =>self::DATA_TYPE_INT,
        'id'                 =>self::DATA_TYPE_INT
    );
    private function getProductProperties() {
        self::$tableSchema = array_merge(parent::$tableSchema, self::$tableSchema);
    }
    public function getTableName(){
        return self::$tableName;
    }
    public static function getParentTableName(){
        return parent::$tableName;
    }
    public static function getParentTableSchema(){
        return parent::$tableSchema;
    }
    public function setID($id) {
        $this->id = $id;
    }
    public function getID() {
        return $this->id;
    }
    public function setWeight($weight) {
        $this->weight = $weight;
    }
    public function getWeight() {
        return  $this->weight;
    }
    public function getProductType() {
        return $this->product_type;
    }
}