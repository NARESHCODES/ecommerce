<?php
session_start();

/**
 * Site Configuration
 */
define('_SITE_NAME',        'SmartShop');

define('_ROOT_PATH',        __DIR__);
define('_ADMIN_PATH',        _ROOT_PATH . "/admin");

define('_ROOT_URL',         'http://' . $_SERVER['HTTP_HOST']);
define('_ADMIN_URL',         _ROOT_URL . "/admin");

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

/**
 * Database configuration
 */
define('_DATABASE_HOST',        'localhost');
define('_DATABASE_USER',        'root');
define('_DATABASE_PASSWORD',    '');
define('_DATABASE_NAME',        'ecommerce');


/**
*check if the current page is login page or not
*/

$haystack=$_SERVER['REQUEST_URI'];
$needle=[
			'index',
			'users',
			'user_add',
			'user_edit',
			'user_delete'
		];
foreach($needle as $value){
if(strpos($haystack,$value)!==false){
$_SESSION['error']="Your session has expired or you've not logged in yet,please login";
}
}
/**
*check if the user is logged in or not
*/
if(strpos($_SERVER['REQUEST_URI'],'admin')!==false){
	$user= new \Lib\Models\User();
	$currentpage=basename($_SERVER['SCRIPT_NAME']);
	if($currentpage!=='login.php' && !$user->isAdminLogin()){
		header('Location:login.php');
		die;
	}
}



