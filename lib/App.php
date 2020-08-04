<?php

namespace lib;

class App
{
    public static function run($controller, $method)
    {
        $c = new $controller;
        $c->run($method);
    }
}