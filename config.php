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