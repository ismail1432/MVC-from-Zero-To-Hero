<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 20/08/2017
 * Time: 23:49
 */
class Router
{
    protected $routes = [];

    public function add($route,$params){
        $this->routes[$route] = $params;
    }

    public function getRoutes(){
        return $this->routes;
    }

}