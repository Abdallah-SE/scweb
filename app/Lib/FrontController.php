<?php
namespace SCANDIWEB\Lib;
use SCANDIWEB\Lib\Template;
/*
 * Front Controller to handle the requests and  the rendering of the classes and their methods and parameters
 * that set in the URL
 */
class FrontController

{
    /*
     * Constants if the controller or action not found
     */
    const CONTROLLER_NOT_FOUND = 'NotFoundController';
    const ACTION_NOT_FOUND = 'notFoundAction';
    /*
     * 
     */
    private $_controller = 'products';
    private $_action = 'default';
    private array $_parameters = array();
    protected $prefixes = array();
    protected $_template;

    public function __construct(Template $template) {
        $this->_template = $template;
        $this->_parseURL();
    }


    /*
     * separate the given url to some parts
     * @return mixed or false or instance of FrontController class
     */
    private function _parseURL() {
        
        $urlFull = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');//Get full url
        $urlOperated = str_replace('public_html/index.php', '', trim($urlFull, '/'));///take wanted url to make rendering
        $url = filter_var(trim($urlOperated, '/'), FILTER_SANITIZE_URL);//Get the path
        $url = trim(parse_url($url, PHP_URL_PATH));//Divide the url and git its components
        $url = explode('/', $url, 3);//Divide the url to three parts
        if (isset($url[0]) && $url[0] !=='') {
           $this->_controller =  $url[0];
        }else{
            $this->_controller = 'addproduct';
            $this->_action = 'listproducts';
        }
        if (isset($url[1]) && $url[1] !=='') {
           $this->_action =  $url[1];
        }
        if (isset($url[2]) && $url[2] !=='') {
           $this->_parameters = explode('/', $url[2]);
        }
    }
    /*
     * 
     * 
     */
    public function addNamespace($prefix = 'SCANDIWEB\Controller') {
        $prefix = trim($prefix, '\\') . '\\';
        return $prefix;
    }
    /*
     * create new instance from the requested controller
     * @return object of Controller class or default index controller
     */
    public function dispatch() {
        $controllerClass =  $this->addNamespace() . ucfirst($this->_controller) . 'Controller';
        $action = $this->_action . 'Action';
        if(!class_exists($controllerClass)) {
            $this->_controller = $controllerClass = $this->addNamespace() . self::CONTROLLER_NOT_FOUND;
            $this->_action = $action = self::ACTION_NOT_FOUND;
        }
        $controller = new  $controllerClass();
        if(!method_exists($controllerClass, $action)) {
            $this->_action = $action = self::ACTION_NOT_FOUND;
        }
        $controller->setControllerName($this->_controller);
        $controller->setActionName($this->_action);
        $controller->setParamerters($this->_parameters);
        $controller->setTemplate($this->_template);
        $controller->$action();
    }
    
}