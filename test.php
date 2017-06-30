<?php
// Test: test.php?router=/test/user

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

$test = new \Petry\MVC\Uri\Param(new \Petry\MVC\Uri\GetByURI());
$test->getParam();
var_dump($test->getParam());
var_dump($test);

use \Petry\MVC\Uri\Parse;
use \Petry\MVC\Uri\Param;
use \Petry\MVC\Uri\GetByURI;
use \Petry\MVC\Uri\UriFacade;

$uri = new GetByURI('router');
$param = new Param($uri);
$parse = new Parse($param);

$parse->getController(); // Controller
$parse->getAction(); // Action
$parse->getParams(); // Params

var_dump($parse);

$facade = new UriFacade();
$facade->getController(); // Controller
$facade->getAction(); // Action
$facade->getParams(); // Params

var_dump($facade);

var_dump([]);
var_dump(is_array([]));
var_dump(empty([]));
var_dump(count([]));

try {
    $factory = new \Petry\MVC\Controller\ControllerFactory(new UriFacade('router'),'Petry\Test\Controller');
    $factory->factory();
}catch (Exception $e){
    echo $e->getMessage();
}
