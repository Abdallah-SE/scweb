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
class ProductsController extends AbstractController

{
    use Helper;
    public function defaultAction() {
        if (isset($_POST['mass_delete'])) {
            if(isset($_POST['checkboxMDelete'])){
                $product_model = new ProductModel();
                $allChecked = implode(',', $_POST['checkboxMDelete']);
                if ($product_model->deleteAll($allChecked)  === true){
                    $this->redirect('/products');
                }
            }
        }
        $this->_data['products'] = ProductModel::getAllProducts();
        $this->_view();
    }
    public function listAction() {
        $this->_view();
    }
    public function addproductAction() {
        if (isset($_POST['save_product'])) {
            if(isset( $_POST['unitBook'])){
            $productObject = new ProductBookModel();
            $productObject->setSKU($this->filterStr($_POST['sku']));
            $productObject->setName($this->filterStr($_POST['name']));
            $productObject->setPrice($this->filterStr($_POST['price']));
            $productObject->setProductType('Book');
            $productObject->setWeight($this->filterStr($_POST['weight']));
            $productObject->CreateProducts();
            $this->redirect('/products');
            }if (isset( $_POST['unitDVD'])) {
            $productObject = new ProductDVDModel();
            $productObject->setSKU($this->filterStr($_POST['sku']));
            $productObject->setName($this->filterStr($_POST['name']));
            $productObject->setPrice($this->filterStr($_POST['price']));
            $productObject->setProductType('DVD-disk');
            $productObject->setSize($this->filterStr($_POST['size']));
            $productObject->CreateProducts();
             $this->redirect('/products');
            }if(isset( $_POST['unitFurniture'])){
            $productObject = new ProductFurnitureModel();
            $productObject->setSKU($this->filterStr($_POST['sku']));
            $productObject->setName($this->filterStr($_POST['name']));
            $productObject->setPrice($this->filterStr($_POST['price']));
            $productObject->setProductType('Furniture');
            $productObject->setDimensions($this->filterStr($_POST['height']) .'X'. $this->filterStr($_POST['width']) .'X'. $this->filterStr($_POST['length']));
            $productObject->CreateProducts();
             $this->redirect('/products');
            }            
        }
        $this->_view();
    }
}