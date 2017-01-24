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

include 'include/header.php';
?>

    <h2>4.php</h2>
    <p class="lead">
        Написать функцию, которая выводит список файлов в заданной директории. Директория задается как параметр функции.
    </p>

    <div class="panel panel-default">
        <div class="panel-body">
            <?php if (is_array($files)): ?>
                <?php if (count($files)): ?>
                    <ul class="alert alert-success list-unstyled">
                        <?php foreach ($files as $file): ?>
                            <li><?= $file ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="alert alert-warning">В директории нет файлов.</p>
                <?php endif; ?>
            <?php else: ?>
                <p class="alert alert-danger">Не могу открыть директорию.</p>
            <?php endif; ?>
        </div>
    </div>

<?php
include 'include/footer.php';