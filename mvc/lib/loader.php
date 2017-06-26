<?php
require_once(ROOT . DS . 'config' . DS . 'config.php');

function __autoload($className) {
    // Three path types are possible: lib class, controller, model
    $libPath = ROOT . DS . 'lib' . DS . strtolower($className) . '.class.php';
    $controllerPath = ROOT . DS . 'controllers' . DS . str_replace('controller', '', strtolower($className)) . '.controller.php';
    $modelPath = ROOT . DS . 'models' . DS . strtolower($className) . '.php';

    if(file_exists($libPath)) {
        require_once($libPath);
    } elseif(file_exists($controllerPath)) {
        require_once($controllerPath);
    } elseif(file_exists($modelPath)) {
        require_once($modelPath);
    } else {
        throw new Exception('Failed to include class: ' . $className);
    }
}