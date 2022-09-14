<?php

namespace App\Routing;

class Router {

    private string $url;
    private array $routes = [];
    private array $namedRoutes = [];

    public function __construct(string $url){
        $this->url = $url;
    }
    public function get(string $path, string $callable, ?string $name = null): Route
    {
        return $this->add($path, $callable, $name, 'GET');
    }
    public function post(string $path, string $callable, ?string $name= null): Route
    {
        return $this->add($path, $callable, $name, 'POST');
    }
    private function add(string $path, string $callable, ?string $name, string $method): Route
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if(is_string($callable) && $name === null){
            $name = $callable;
        }
        if($name){
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    public function run():mixed
    {
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

    public function url(string $name, array $params = []): array|string
    {
        if(!isset($this->namedRoutes[$name])){
            throw new RouterException('No route matches this name');
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }
    public static function generate(string $uri): string
    {
        return '/P5_Blog_PHP' . $uri ;
    }

}