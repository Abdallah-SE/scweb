<?php 
namespace SCANDIWEB\Lib\Database;
use SCANDIWEB\Lib\Database\PdoHandler;
use SCANDIWEB\Lib\Database\MysqliHandler;
/**The  MysqldbHandler class that connects to the mysql database*/
abstract class MysqldbHandler {
    //Properties
    const PDO = 1;
    const MYSQLI = 2;
    
    ////Functions
    /// Suitable for any initialization of the MysqldbHandler
    private function __construct() {
    }
    /*initialize the connection*/
    abstract protected static function init (); //////This function  Force the extending classes to define this mesthods
    /*Take an instance from the class */
    abstract protected static function getInstance (); //////This function  Force the extending classes to define this mesthods
   /*Connect to the DB*/
    public static function connect() { ////static make it accessible  without needing  an instantiation of the class or this keyword
        $_driver =  DATABASE_CONNECTION_DRIVER; ///variable to hold the driver value
        if ( $_driver == self::PDO ) { //Check if the driver is the mysqli
            return PdoHandler::getInstance();  /// Get instance from the mysqlihandler if it's not created yet
        }  elseif( $_driver == self::MYSQLI) { ///check elseif the driver is the pdo
            return MysqliHandler::init();            /// init the pdo connection style t
        }
    }  
}
?>