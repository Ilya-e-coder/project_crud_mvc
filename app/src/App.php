<?php

namespace app\src;

class App
{
    public function run()
    {
        $router = new Router();
        $router->dispatch();
        echo 'router';
    }
}
