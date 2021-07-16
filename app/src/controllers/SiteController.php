<?php

namespace app\src\controllers;

use app\src\models\DbConnectModel;

class SiteController extends BaseController
{
    public function index(): void
    {
        $DbConnectModel = new DbConnectModel();
        echo $this->render('index', [
            'dbData' => $DbConnectModel->getDbData()
        ]);
    }
}