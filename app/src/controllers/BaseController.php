<?php

namespace app\src\controllers;

class BaseController
{
    public function render(string $path, array $args = [])
    {
        extract($args);
        ob_start();
        include( __DIR__ . '/../views/' . $path . '.php');
        return ob_get_clean();
    }
}
