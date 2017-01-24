<?php
/*
 * Написать функцию, которая выводит список файлов в заданной директории. Директория задается как параметр функции.
 */

function getFiles($dir)
{
    // Подавляем вывод сообщения об ошибке для несуществующей директории.
    // TODO: Задать обработчик ошибок E_WARNING.
    $files = @scandir($dir);

    if ($files) {
        $result = [];
        foreach ($files as $file) {
            if (is_file($dir . DIRECTORY_SEPARATOR . $file)) {
                $result[] = $file;
            }
        }
    } else {
        $result = FALSE;
    }

    return $result;
}

$dir = __DIR__ . DIRECTORY_SEPARATOR . '4';
$files = getFiles($dir);
if (!(is_array($files))) {
    $error = 'Не могу открыть директорию.';
} elseif (!$files) {
    $error = 'В директории нет файлов.';
}

include 'include/header.php';
?>

    <h2>4.php</h2>
    <p class="lead">
        Написать функцию, которая выводит список файлов в заданной директории. Директория задается как параметр функции.
    </p>

    <div class="panel panel-default">
        <div class="panel-body">
            <?php if (isset($error)): ?>
                <p class="alert alert-danger"><?= $error ?></p>
            <?php endif; ?>
            <?php if (!empty($files)): ?>
                <ul class="alert alert-success list-unstyled">
                    <?php foreach ($files as $file): ?>
                        <li><?= $file ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>

<?php
include 'include/footer.php';