<?php
namespace SCANDIWEB\Controller;
use SCANDIWEB\Lib\FrontController;
/*
 * Front Controller to handle the requests and  the rendering of the classes and their methods and parameters
 * that set in the URL
 */
class AbstractController

{
    protected $_controllerName;
    protected $_actionName;
    protected $_paramerters;
    protected $_template;
    
    protected $_data = [];
    public function notFoundAction() {
        $this->_view();
    }
    public function setControllerName($controllerName) {
        $this->_controllerName = $controllerName;
    }
    public function setActionName($actionName) {
        $this->_actionName = $actionName;
    }
    public function setParamerters($paramerters) {
        $this->_paramerters = $paramerters;
    }
    public function setTemplate($template) {
        $this->_template = $template;
    }
    public function _view() {
        $view = APP_VIEWS . $this->_controllerName . DS . $this->_actionName . '.view.php';
        if($this->_actionName == FrontController::ACTION_NOT_FOUND || !file_exists($view)){
            $view = APP_VIEWS . 'notfound' . DS . 'notfound.view.php';
            $this->_template->setContentViewFile($view);
            $this->_template->renderAppTemplate();
        } else {
            $this->_template->setData($this->_data);
            $this->_template->setContentViewFile($view);
            $this->_template->renderAppTemplate();
        }
        }
}