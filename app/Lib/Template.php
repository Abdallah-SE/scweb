<?php
namespace SCANDIWEB\Lib;
class Template
{
    protected $_template = array();
    protected $_content_view;
    protected $_data;
    public function __construct(array $template) {
        if(!empty($this->_data) &&  isset($this->_data)){
                    extract($this->_data);
                }
        $this->_template = $template;
    }
    public function setContentViewFile($content_view) {
        $this->_content_view = $content_view;
    }
    public function setData($data) {
        $this->_data = $data;
    }
    private function setTemplaeView() {
        if(!array_key_exists('template', $this->_template)){
            trigger_error('Error in template parts including???', E_USER_WARNING);
        }  else {
            $parts = $this->_template['template'];
            if(!empty($parts)){
                foreach ($parts as $part =>$file) {
                    if($part == ':ContentFile'){
                        if(!empty($this->_data) &&  isset($this->_data)){
            extract($this->_data);
        }
                        require_once $this->_content_view;
                    }
                }
            }
        }
    }
    private function renderTemForHeader() {
        $output = '';
        if(!array_key_exists('tem_head_resource', $this->_template)){
            trigger_error('Error in define resources in the header', E_USER_DEPRECATED);
        }  else {
            $resources = $this->_template['tem_head_resource'];
            // CSS files
            $CSS = $resources['css'];
            if(!empty($CSS)){
                foreach ($CSS as $key => $pathValue) {
                    $output .= '<link rel="stylesheet" type="text/css" href="'.$pathValue.'">';
                }
            }
        }
        echo $output;
    }
    private function renderTemForFooter() {
        $output = '';
        if(!array_key_exists('tem_foot_resource', $this->_template)){
            trigger_error('Error in define resources in the footer', E_USER_DEPRECATED);
        }  else {
            $footer_resources = $this->_template['tem_foot_resource'];
            if(!empty($footer_resources)){
                foreach ($footer_resources as $key => $pathValue) {
                    $output .= "<script" . " defer " . " src =" ."\"". "{$pathValue}" ."\" "." type=" . "\""."text/javascript"."\"".">" ."</script>";
                } 
            }
        }
        echo $output;
    }
        private  function renderHeaderStart(){
        require_once APP_Template . 'HeaderFile.php';
    }
    private  function renderCompleteHeader(){
        require_once  APP_Template . 'CompleteHeader.php';
    }private  function renderFooter(){
        require_once  APP_Template . 'FooterFile.php';
    }
    public function renderAppTemplate() {
        if(!empty($this->_data) &&  isset($this->_data)){
            extract($this->_data);
        }
        $this->renderHeaderStart();
        $this->renderTemForHeader();
        $this->renderCompleteHeader();
        $this->setTemplaeView();
        $this->renderTemForFooter();
        $this->renderFooter();
    }
}