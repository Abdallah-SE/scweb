<?php
namespace SCANDIWEB\Model\ProductModel;
use SCANDIWEB\Model\ProductModel\ProductModel;
class ProductFurnitureModel extends ProductModel {
    public $product_type = 'Furniture';
    public $dimensions;
    public $id;
   
    public static $tableName = 'furniture';
    protected static $primaryKey = 'id';
    public function __construct() {
    }
    public static $tableSchema = array(
        'product_type'       =>self::DATA_TYPE_STR,
        'dimensions'         =>self::DATA_TYPE_STR,
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
    public static function getUnitName(){
        var_dump(self::$tableSchema[0]);
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
    public function setDimensions($dimensions) {
        $this->dimensions = $dimensions;
    }
    public function getDimensions() {
        return  $this->dimensions;
    }
    public function getProductType() {
        return $this->product_type;
    }
}