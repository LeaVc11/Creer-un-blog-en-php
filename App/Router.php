<?php

namespace App;

class Router
{
    private mixed $url;
    private $routes = [];

    /**
     * @param mixed $url
     */
    public function __construct(mixed $url)
    {
        $this->url = $url;
    }
}