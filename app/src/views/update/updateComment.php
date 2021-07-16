<?php
/**
 * @var $dbData array
 * @var $update array
 * @var $sendUpdateCommentToDb array
 */
foreach ($update as $value):

?>
<h3>Редактирование комментария</h3>

<form action="update/add" method="get" enctype="multipart / form-data">

    <input type="hidden" name="id" value="<?=$value['id']?>">
    <p>Комментарий</p>
    <textarea name="comment"><?=$value['post'] ?? '' ?></textarea>
    <br><br>
    <!-- Ограничение размера файлов -->
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    <!-- Выберите файл -->
    <input type="file" name="content" accept="image/*">
    <br> <br> <br>
    <!-- Кнопка добавления коммента -->
    <button type="submit" name="Update">Редактировать</button> <br><br>
    <input type="button" value="Назад" onclick="window.history.back()" />
<?php endforeach;?>