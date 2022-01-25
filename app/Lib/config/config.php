<?php
if (!defined('DS')) {
  define('DS', DIRECTORY_SEPARATOR);  
}
defined('APP_PATH') ? null : define('APP_PATH', realpath($_SERVER["DOCUMENT_ROOT"]) . DS.  'app');
defined('APP_VIEWS') ? null : define('APP_VIEWS', APP_PATH . DS . 'View' . DS);
//// Template config files
defined('APP_Template') ? null : define('APP_Template', APP_PATH . DS . 'Template' . DS);
defined('CSS') ? null : define('CSS', '/assets/css/');
defined('JS') ? null : define('JS', '/assets/js/');

//// Details For database
//////////Define the driver of DB mode and mechanism
if(!defined('DATABASE_CONNECTION_DRIVER')) {
    define('DATABASE_CONNECTION_DRIVER', 1);
}
//define('DATABASE_CONNECTION_DRIVER') ? NULL : define('DATABASE_CONNECTION_DRIVER', 1);
defined('DATABASE_HOST_NAME')       ? null : define ('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')       ? null : define ('DATABASE_USER_NAME', 'id18323372_scdbuser1');
defined('DATABASE_PASSWORD')        ? null : define ('DATABASE_PASSWORD', 'JuXtWJHkB2n<s4s5');
defined('DATABASE_DB_NAME')         ? null : define ('DATABASE_DB_NAME', 'id18323372_scdb');