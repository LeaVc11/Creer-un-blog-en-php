<?php

namespace App\Routing;

class Router
{
    private mixed $url;
    private array $routes = [];
    private array $nameRoutes = [];


    /**
     * @param mixed $url
     */
    public function __construct(mixed $url)
    {
        $this->url = $url;
    }

    public function get($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'GET');
    }

    public function add($path, $callable, $name, $method)
    {
        $route = new Route($path, $callable);
        $this->routes['$method'][] = $route;
        if (is_string($callable) && $name === null){
            $name = $callable;
        }
        if ($name) {
            $this->nameRoutes[$name] = $route;
        }
        return $route;
    }

    public function post($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'POST');
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouterException('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        throw new RouterException('No matching routes');
    }

    public function url($name, $params = [])
    {
        if (!isset($this->nameRoutes[$name])) {
            throw new RouterException('No route match this name');
        }
        return $this->nameRoutes[$name]->getUrl($params);
    }
}