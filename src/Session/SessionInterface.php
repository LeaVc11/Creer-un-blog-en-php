<?php

namespace Session;

interface SessionInterface
{
    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, mixed $default = null): void;

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value): void;

    /**
     * @param $key
     */
    public function delete($key):void;
}