<?php
namespace SCANDIWEB\Controller;
use SCANDIWEB\Controller\AbstractController;
use SCANDIWEB\Model\ProductModel\ProductModel;
use SCANDIWEB\Model\ProductModel\ProductBookModel;
use SCANDIWEB\Model\ProductModel\ProductDVDModel;
use SCANDIWEB\Model\ProductModel\ProductFurnitureModel;
use SCANDIWEB\Lib\Helper;
/*
 * Front Controller to handle the requests and  the rendering of the classes and their methods and parameters
 * that set in the URL
 */
class AddproductController extends AbstractController

{
    use Helper;
    public function defaultAction() {
        if (isset($_POST['save_product'])) {
            if(isset($_POST['productType'])){
                
                $unitValue = implode('X', $_POST['unitValue']);               
                $productObject = ucwords($_POST['productType']);
                $productObject = "SCANDIWEB\Model\ProductModel\\".'Product' . trim($productObject) . 'Model';
                $productOb = new $productObject($unitValue);
                $productOb->setSKU($this->filterStr($_POST['sku']));
                $productOb->setName($this->filterStr($_POST['name']));
                $productOb->setPrice($this->filterStr($_POST['price']));
                $productOb->setProductType(ucwords($_POST['productType']));
                $productOb->CreateProducts();
                $this->redirect('/');
                
            }         
        }
        $this->_view();
}
    public function listProductsAction() {
    if (isset($_POST['mass_delete'])) {
        if(isset($_POST['checkboxMDelete'])){
            $product_model = new ProductModel();
            $allChecked = implode(',', $_POST['checkboxMDelete']);
            if ($product_model->deleteAll($allChecked)  === true){
                $this->redirect('/');
            }
        }
    }
    $this->_data['products'] = ProductModel::getAllProducts();
    $this->_view();
   }
}