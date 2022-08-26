<?php

namespace App\Routing;

class Router
{
    private ?string $url;
    private array $routes = [];

    /**
     * @param mixed $url
     */
    public function __construct(?string $url)
    {
        $this->url = $url;
    }

    public function get($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
        return $route;
    }

    public function post($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['_POST'][] = $route;
        return $route;
    }
    /**
     * @throws \Exception
     */
    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        throw new RouterException('No matching routes');
    }
}