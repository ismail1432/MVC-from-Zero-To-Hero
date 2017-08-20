<?php
//launch autoloader
require_once('../vendor/autoload.php');

//DISPLAY ERRORS
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new \MVC\Core\Router();

$router->add('',['controller'=>'Home', 'action'=>'index']);
$router->add('posts',['controller'=>'Posts', 'action'=>'index']);
$router->add('posts/new',['controller'=>'Posts', 'action'=>'new']);

echo '<pre>';
die(print_r($router->getRoutes()));
echo '<pre>';
