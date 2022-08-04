<?php

namespace App\Routing;

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

    public function match($url): bool
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

    public function paramMatch($match)
    {
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        return  '([^/]+';
    }

    public function call()
    {
        return call_user_func_array($this->callable, $this->matches);
    }

    private function preg_replace_collback(string $string, array $array, string $path)
    {
    }


}