<?php

namespace App\core;

use App\core\Controller;

class Router extends Controller
{
    protected $routes = [];


    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];  
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $full_uri=$_SERVER['REQUEST_URI'];
        $query= parse_url($full_uri,PHP_URL_QUERY);
        echo $query;
        $method =  $_SERVER['REQUEST_METHOD'];
        // print_r($this->routes);
        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];
            // var_dump($controller);
            // var_dump($action);

            $controller = new $controller();
            // var_dump($controller);
            $controller->$action();
            // var_dump($action);
        } else {
            $this->render('404');
            
        }
    }
}