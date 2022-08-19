<?php

namespace App\Routing;
/**
 * @method preg_replace_callback(string $string, array $array, string $path)
 */
class Route
{
    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callable){
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function with($param, $regex): static
    {
        $this->params[$param] = $regex;
        return $this;
    }

    public function match($url): bool
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;  // On sauvegarde les paramètre dans l'instance pour plus tard
        return true;
    }

    public function paramMatch($match): string
    {
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+';
    }

    public function call()
    {
        if (is_string($this->callable)) {
            $params = explode('#', $this->callable);
            $controller = "App\\Controllers\\" . $params[0] . "Controller";
            $controller = new $controller();
            return call_user_func_array([$controller, $params[1]],$this->matches);
        } else {
            return call_user_func_array($this->callable, $this->matches);
        }
    }

    public function getUrl($params)
    {
        $path = $this->path;
        foreach ($params as $key => $value) {
            $path = str_replace(":sk", $value, $path);
        }
        return $path;
    }
}