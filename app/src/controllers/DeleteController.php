<?php


namespace app\src\controllers;
use app\src\models\DbConnectModel;
header("Location:../");

class DeleteController extends BaseController
{
    public function delete(): void
    {
        $DbConnectModel = new DbConnectModel();

        echo $this->render('index', [
            'delete' => $DbConnectModel->deleteComment()
        ]);
    }

}