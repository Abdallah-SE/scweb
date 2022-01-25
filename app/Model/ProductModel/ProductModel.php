<?php
namespace SCANDIWEB\Model\ProductModel;
use SCANDIWEB\Model\AbstractModel;
class ProductModel extends AbstractModel{
    protected $sku;
    protected $name;
    protected $price;
    protected $product_type;
   
    protected static $tableName = 'products';
    protected static $primaryKey = 'id';
    
    public static $tableSchema = array(
        'sku'            =>self::DATA_TYPE_STR,
        'name'             =>self::DATA_TYPE_STR,
        'price'            =>self::DATA_TYPE_DECIMAL,
        'product_type'          =>self::DATA_TYPE_STR
    );
    public function getTableName(){
        return self::$tableName;
    }
    public function setSKU($sku) {
        $this->sku = $sku;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    public function setProductType($product_type) {
        $this->product_type = $product_type;
    }
    public function getSKU() {
        return $this->sku;
    }
    public function getName() {
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getProductType() {
        return $this->product_type;
    }
    public function getID() {
        return $this->id;
    }
    public static function getAllProducts() {
        $sql =
                'SELECT P.* , D.size, B.weight, F.dimensions
                FROM '.self::$tableName.' P
                LEFT OUTER JOIN dvd D
                ON P.id = D.id
                LEFT OUTER JOIN book B
                ON P.id = B.id
                LEFT OUTER  JOIN furniture F
                ON P.id = F.id
                ORDER BY P.id ASC;';
        return self::get($sql);
    }
    public function createProduct() {
        
    }
}