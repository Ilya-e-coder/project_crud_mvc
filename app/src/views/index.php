<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поделитесь комментарием</title>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #ffc3e9;
    }

    td {
        background: antiquewhite;
    }
</style>
<body>
<h1>Комментарии гостей сайта</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Дата публикации</th>
        <th>Комментарий</th>
        <th>Последнее изменение</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    <tr>

        <?php


        /**
         * @var $dbData array
         * @var $save array
         */


        foreach ($dbData as $value): ?>
        <td><?php echo $value['id']?></td>
        <td><?php echo $value['date']?></td>
        <td><?php echo $value['post'] . '<br>' . $value['content'] ?></td>
        <td><?php echo $value['last_update']?></td>
        <td><a style="color: rgba(101,193,76,0.79)" href="update?id=<?=$value['id'] ?>">Обновить</a></td>
        <td><a style="color: rgba(255,55,38,0.79)" href="delete?id=<?=$value['id'] ?>">Удалить</a></td>
    </tr>
    <?php endforeach;
    ?>


</table>
<br><br>
<form action="addcomment" enctype="multipart/form-data" method="post">
    <h3>Добавьте свой комментарий</h3>
    <textarea name="comment"></textarea><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    <input type="file" name="content" multiple accept="image/*, image/png"><br><br>
    <button type="submit" value="Отправить">Отправить</button>
</form>
<?php

?>
</body>
</html>
