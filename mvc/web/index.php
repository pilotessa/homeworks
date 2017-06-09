<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS', ROOT . DS . 'views');

// Start session
session_start();

// Include autoloader
require_once(ROOT . DS . 'lib' . DS . 'loader.php');

// Run
App::run($_SERVER['REQUEST_URI']);