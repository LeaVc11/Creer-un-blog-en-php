<?php

namespace App\Routing;

/**
 * @method preg_replace_callback(string $string, array $array, string $path)
 */
class Route
{
    private string $path;
    private $callable;
    private $matches = [];
    private $params = [];

    /**
     * @param $path
     * @param $callable
     */
    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function with($param, $regex)
    {
        $this->params[$param] = $regex;
        return $this;
    }

    public function match($url)
    {
        $url = trim($url, '/');
        $path = $this->preg_replace_collback('#:(\w+)#', [$this, 'paramMatch'], $this->path);
//        var_dump($path);
        $regex = "#^$path#i";
        //        var_dump($regex);
        if (preg_match($regex, $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
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
            $controller = "App\\Controllers\\" . $params[0] . "Controllers";
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