<?php

namespace app\config;

use app\src\controllers\CommentController;
use app\src\controllers\DeleteController;
use app\src\controllers\UpdateController;
use FastRoute\Dispatcher;
use app\src\controllers\SiteController;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Routes
{
    public function getRoutes(): Dispatcher
    {
        return simpleDispatcher(function (RouteCollector $r) {
            $r->addRoute('GET', '/', SiteController::class . '/index');

            $r->addRoute('POST', '/addcomment', CommentController::class . '/save');

            $r->addRoute('GET', '/update', UpdateController::class . '/update');

            $r->addRoute('GET', '/update/add', UpdateController::class . '/sendUpdateCommentToDb');

            $r->addRoute('GET', '/delete', DeleteController::class . '/delete');

        });
    }
}
