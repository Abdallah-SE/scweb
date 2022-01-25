<?php
namespace SCANDIWEB\Lib;

class AutoLoader
{
    /*
     * 
     */
    public function loadMappedFile() {
        
    }
    /*
     * if a file exists require it from the file system
     * @param $file to require
     * @return bool true if the file exists false if not
     */
    public function requireFile($file)
    {
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }/*
     * 
     * 
     */
    public static function autoLoad($className) {
        $className = str_replace('SCANDIWEB', '', $className) . '.php';
        $className = str_replace('\\', DS,$className);
        $classFile = APP_PATH . $className;
        if (file_exists($classFile)) {
            require_once $classFile;
        }
    }
}
spl_autoload_register(__NAMESPACE__ . '\AutoLoader::autoLoad');