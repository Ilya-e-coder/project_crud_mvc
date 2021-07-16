<?php

namespace app\src;

use app\config\Routes;
use FastRoute\Dispatcher;

class Router
{
    public function dispatch(): void
    {
        $routes = new Routes();

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $routes->getRoutes()->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo 'Not found';
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                echo 'Method not allowed';
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                list($class, $method) = explode('/',$handler,2);
                $controller = new $class();
                $controller->{$method}(...array_values($vars));
                break;
        }
    }
}
