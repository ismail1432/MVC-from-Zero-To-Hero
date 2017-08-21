<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 20/08/2017
 * Time: 23:49
 */
namespace MVC\Core\Router;

use Symfony\Component\Yaml\Yaml;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $this->routes = LoadRouting::loadRoutes();
    }

    public function add($route,$params)
    {
        // Convert to a regular exprssion escape forward slash
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a–z-]+)', $route);

        //Add start and end delimiters, and cas insensitive flag
        $route = '/^' . $route. '$/i';

        $this->routes[$route] = $params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function match($url)
    {
        /*
        foreach ($this->routes as $route => $params){
            echo "URL :$url ----- ROUTE:$route <br>";
            if($url == $route){

                $this->params = $params;
                return true;
            }
        }
        return false;
        */
        $reg_exp = "/^(?P<controller>[a-z]+)\/(?<action>[a-z-]+)$/";
        if(preg_match($reg_exp,$url,$matches)){

            $params = [];
            foreach ($matches as $key => $match){
                if(is_string($key)){
                    $params[$key] = $match;
                }
            }

            $this->params = $params;
        }
        return true;

    }

    public function getParams(){
        return $this->params;
    }

}