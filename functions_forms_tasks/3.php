<?php
/*
 * Есть текстовый файл. Необходимо удалить из него все слова, длина которых превыщает N символов. Значение N задавать
 * через форму. Проверить работу на кириллических строках - найти ошибку, найти решение.
 */

function removeLongWords($a, $n)
{
    // Разбиваем строку на слова и разделители
    $delimiters = '/([\s\d!"#$%&\'()*+,-.\/:;<=>?@[\\]^_`{|}~]+)/';
    $parts = preg_split($delimiters, $a, -1, PREG_SPLIT_DELIM_CAPTURE);

    // Отфильтровываем длинные слова
    $isLongWord = function ($s) use ($n, $delimiters) {
        return preg_match($delimiters, $s) || mb_strlen($s) <= $n;
    };
    $parts = array_filter($parts, $isLongWord);

    // Объединяем элементы массива в конечную строку
    return join($parts);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Фильтрация и валидация
    $errors = [];

    $number1 = filter_input(INPUT_POST, 'number1', FILTER_VALIDATE_INT);
    if (!$number1) {
        $errors[] = 'Введите N.';
    }

    if (empty($_FILES['text1']) || !$_FILES['text1']['size'] || $_FILES['text1']['error'] != UPLOAD_ERR_OK ||
        mime_content_type($filename = $_FILES['text1']['tmp_name']) != 'text/plain'
    ) {
        $errors[] = 'Загрузите текстовый файл.';
    }

    //Если все ок, удаляем слова и результат записываем в файл
    if (empty($errors)) {
        $text1 = file_get_contents($filename);
        $result = removeLongWords($text1, $number1);
        $resultFilename = '3/result.txt';
        $resultPath = __DIR__ . DIRECTORY_SEPARATOR . $resultFilename;
        file_put_contents($resultPath, $result);
    } else {
        $error = join('<br>', $errors);
    }
}

include 'include/header.php';
?>

    <h2>3.php</h2>
    <p class="lead">
        Есть текстовый файл. Необходимо удалить из него все слова, длина которых превыщает N символов. Значение N
        задавать через форму. Проверить работу на кириллических строках - найти ошибку, найти решение.
    </p>

    <div class="panel panel-default">
        <div class="panel-body">
            <?php if (isset($error)): ?>
                <p class="alert alert-danger"><?= $error ?></p>
            <?php endif; ?>
            <?php if (isset($resultFilename)): ?>
                <p class="alert alert-success"><a href="<?= $resultFilename ?>" target="_blank">Результат</a></p>
            <?php endif; ?>

            <form enctype="multipart/form-data" action="" method="post">
                <div class="form-group">
                    <label for="number1">N</label>
                    <input type="text" name="number1" id="number1" class="form-control"
                           value="<?= isset($number1) ? $number1 : '' ?>">
                </div>
                <div class="form-group">
                    <label for="text1">Текст</label>
                    <input type="file" name="text1" id="text1" accept="text/plain" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">Ок</button>
            </form>
        </div>
    </div>

<?php
include 'include/footer.php';