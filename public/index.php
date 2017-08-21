<?php
//launch autoloader
require_once('../vendor/autoload.php');

//define const for file
define('APP_ROOT',__DIR__);

//DISPLAY ERRORS
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new \MVC\Core\Router\Router();


$url = $_SERVER['QUERY_STRING'];
echo "URL : $url";
echo "<br>";
$router->match($url);

    print_r($router->getParams());


