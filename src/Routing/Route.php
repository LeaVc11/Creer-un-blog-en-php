<?php

namespace App\Routing;
/**
 * @method preg_replace_callback(string $string, array $array, string $path)
 */
class Route {

    private string $path;
    private string $callable;
    private array $matches = [];
    private array $params = [];

    public function __construct(string $path, string $callable){
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function with( string $param, string $regex): static
    {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    public function match(string $url): bool
    {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    private function paramMatch(array $match): string
    {
        if(isset($this->params[$match[1]])){
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }
    public function call():mixed
    {
        if(is_string($this->callable)){
            $params = explode('#', $this->callable);

            $controller = "App\\Controllers\\" . $params[0] . "Controller";

            $controller = new $controller();

            return call_user_func_array([$controller, $params[1]], $this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
    }

    public function getUrl( array $params): array|string
    {
        $path = $this->path;
        foreach($params as $k => $v){
            $path = str_replace(":$k", $v, $path);
        }
        return $path;
    }

}