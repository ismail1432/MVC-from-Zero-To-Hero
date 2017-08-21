<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 21/08/2017
 * Time: 00:55
 */

namespace MVC\Core\Router;

use Symfony\Component\Yaml\Yaml;

class LoadRouting
{
    public static function loadRoutes()
    {
        $routes =  Yaml::parse(file_get_contents(APP_ROOT.'/../Core/routing.yaml'));
        //die(var_dump($routes));
        return $routes;
    }

    public function pathConstructor($routes, $params)
    {
        foreach ($routes as $route){
            // Convert to a regular exprssion escape forward slash
            $route = preg_replace('/\//', '\\/', $route);

            // Convert variables e.g {controller}
            $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a–z-]+)', $route);

            //Add start and end delimiters, and cas insensitive flag
            $route = '/^' . $route. '$/i';

            $this->routes[$route] = $params;
        }
    }

}