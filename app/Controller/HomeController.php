<?php
namespace SCANDIWEB\Controller;
use SCANDIWEB\Controller\AbstractController;
/*
 * Front Controller to handle the requests and  the rendering of the classes and their methods and parameters
 * that set in the URL
 */
class HomeController  extends AbstractController

{
    public function defaultAction() {
        $this->_view();
    }
}