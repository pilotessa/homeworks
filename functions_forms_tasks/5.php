<?php
/*
 * Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово. Директория и
 * искомое слово задаются как параметры функции.
 */

function searchFiles($dir, $word)
{
    $files = glob($dir . DIRECTORY_SEPARATOR . "*{$word}*");

    if ($files) {
        $result = [];
        foreach ($files as $file) {
            if (is_file($file)) {
                $result[] = basename($file);
            }
        }
    } else {
        $result = FALSE;
    }

    return $result;
}

$dir = __DIR__ . DIRECTORY_SEPARATOR . '5';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $word1 = filter_input(INPUT_POST, 'word1', FILTER_SANITIZE_STRING);

    if ($word1) {
        $files = searchFiles($dir, $word1);
        if (!$files) {
            $error = 'Ничего не найдено.';
        }
    } else {
        $error = 'Введите слово.';
    }
}

include 'include/header.php';
?>

    <h2>5.php</h2>
    <p class="lead">
        Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.
        Директория и искомое слово задаются как параметры функции.
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

            <form action="" method="post">
                <div class="form-group">
                    <label for="word1">Введите слово</label>
                    <input type="text" name="word1" id="word1" class="form-control"
                           value="<?= isset($word1) ? $word1 : '' ?>">
                </div>
                <button type="submit" class="btn btn-default">Ок</button>
            </form>
        </div>
    </div>

<?php
include 'include/footer.php';