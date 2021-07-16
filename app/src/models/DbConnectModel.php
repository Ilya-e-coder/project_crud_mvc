<?php

namespace app\src\models;

use app\config\Db;

class DbConnectModel
{

    public function getDbData(): array
    {
        return Db::getDbh()->query("select * from comments order by id")->fetchAll();

    }

    public function saveCommentToDb(): void
    {
        if ((!empty($_POST["comment"])) || (!empty($_FILES['content']['name']))) {
            //sql инъекция
            $comment = $_POST["comment"];
            $content = $_FILES['content']['name'];
            //sql инъекция
            $contentTmp = $_FILES['content']['tmp_name'];
            $contentDir = __DIR__ . '/../views/uploadImages';
            move_uploaded_file($contentTmp, "$contentDir/$content");

            $prepareDb = Db::getDbh()->prepare("INSERT INTO comments (date, post, content)
            VALUES (now(), '$comment', '$content')");
            $prepareDb->execute();

        } else {
            die();
        }
    }

    public function updateComment(): array
    {
        $commentId = $_GET['id'];
        return Db::getDbh()->query("select * from comments WHERE id = '$commentId'")->fetchAll();

    }

    public function sendUpdateCommentToDb(): void
    {
        header("Location:../");
        $id = $_GET['id'];
        $comment = $_GET["comment"];
        $content = $_FILES['content']['name'];

        $prepareUpload = Db::getDbh()->prepare("
    UPDATE public.comments
    SET post    = '$comment',
    last_update    = now(),
    content = '$content'
    WHERE id = '$id'
    ");
        $prepareUpload->execute();
    }

        public function deleteComment(): void
        {
            $id = $_GET['id'];
            $prepareDelete = Db::getDbh()->prepare("DELETE FROM public.comments WHERE id = '$id'");
            $prepareDelete->execute();

        }



}
