<?php


namespace app\src\controllers;

use app\src\models\DbConnectModel;


class UpdateController extends BaseController
{
    public function update()
    {
        $DbConnectModel = new DbConnectModel();
        echo $this->render('update/updateComment',[
            'update' => $DbConnectModel->updateComment()
        ]);
    }

    public function sendUpdateCommentToDb()
    {
        $DbConnectModel = new DbConnectModel();
        echo $this->render('update/updateComment', [
            'sendUpdateCommentToDb' => $DbConnectModel->sendUpdateCommentToDb()
        ]);


    }

}