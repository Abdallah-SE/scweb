<?php
namespace SCANDIWEB\Lib\Database;
use SCANDIWEB\Lib\Database\MysqldbHandler;
class PdoHandler extends MysqldbHandler {
    ///Properties
    private static $_handler;  /// The connecting details
    private static $_instance;  /// The connecting instance
    protected $_result;
    ///Function
    private  function __construct(){
        self::init();
    }
    public function __call($name, $arguments) {
        return call_user_func_array(
                array(
                    &self::$_handler, $name
                ),
                $arguments);
    }
    ///  init() fun to Take the DB details to connect
    protected static function init () {
        try {///Using try and catch to facilitate the catching of potential exceptions
            self::$_handler = new \PDO(
                'mysql:hostname=' . DATABASE_HOST_NAME . ';dbname=' . DATABASE_DB_NAME,
                DATABASE_USER_NAME, DATABASE_PASSWORD, array(
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                )
            );
        } catch (\PDOException $pdoE) {
            trigger_error("Error in connecting with mysql database".$pdoE, E_USER_ERROR); /// Print the error
        }
    }
    /// Get one instance from the class--->MysqldbHandler
    protected static function getInstance () {
        if ( self::$_instance === NULL ) { /// check if there is no instance of the MysqldbHandler object
            self::$_instance = new self(); /// Return new instance of the MysqldbHandler object
            return self::$_instance;
        } else {
            return self::$_instance;       /////// create the current MysqldbHandler  object
        }
    }
}

?>
