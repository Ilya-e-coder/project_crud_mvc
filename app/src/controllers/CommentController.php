<?php

namespace app\src\controllers;

use app\src\models\DbConnectModel;

header("Location:../");
class CommentController extends BaseController
{
    public function index(): void
    {
        //получение данных как у SiteController
        $DbConnectModel = new DbConnectModel();

        echo $this->render('index', [
            'dbData' => $DbConnectModel->getDbData()
        ]);
    }

    public function save(): void
    {

        //save logic
        $DbConnectModel = new DbConnectModel();

        echo $this->render('index', [
            'save' => $DbConnectModel->saveCommentToDb()
        ]);

    }
}
