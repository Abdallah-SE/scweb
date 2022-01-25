<?php
namespace SCANDIWEB\Model\ProductModel;
use SCANDIWEB\Model\ProductModel\ProductModel;
class ProductDVDModel extends ProductModel {
    
    protected $product_type = 'DVD-disk';
    protected $size;
    protected $id;
   
    public static $tableName = 'dvd';
    protected static $primaryKey = 'id';
    public function __construct() {
        //$this->getProductProperties();
    }
    public static $tableSchema = array(
        'product_type'       =>self::DATA_TYPE_STR,
        'size'               =>self::DATA_TYPE_INT,
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
    public function setSize($size) {
        $this->size = $size;
    }
    public function getSize() {
        return  $this->size;
    }
    public function getProductType() {
        return $this->product_type;
    }
}