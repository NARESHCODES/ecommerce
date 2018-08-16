<?php
session_start();

/**
*site configuration
*/
define('_SITE_NAME', 'Smartshop');
define('_ROOT_PATH', __DIR__);
define('_ADMIN_PATH', _ROOT_PATH."/admin");

define('_ROOT_URL','http://'.$_SERVER['HTTP_HOST']);
define('_ADMIN_URL',_ROOT_URL."/admin");

/**
/*Database configuration
*/
define('_DATABASE_HOST', 'localhost');
define('_DATABASE_USER', 'root');
define('_DATABASE_PASSWORD','');
define('_DATABASE_NAME','ecommerce');

/**
 * Loads the classes automatically
 *
 * @param $className
 */
function __autoload($className) {
    $classNames = str_replace('\\', '/', $className);
    $classFileName = __DIR__ . "/$classNames.php";
    if(file_exists($classFileName)) {
        include $classFileName;
    }
};
