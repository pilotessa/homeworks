<?php
/*
 * Функции для работы с коммпентариями
 */

function getForbiddenWords()
{
    return ['рыба', 'рыбы', 'рыбе', 'рыбу', 'рыбой'];
}

function checkForbiddenWords($string)
{
    // Разбиваем строку на слова и разделители
    $delimiters = '/([\s\d!"#$%&\'()*+,-.\/:;<=>?@[\\]^_`{|}~]+)/';
    $parts = preg_split($delimiters, $string, -1, PREG_SPLIT_NO_EMPTY);

    // Есть совпадения с запрещенными словами?
    $result = array_intersect($parts, getForbiddenWords());
    return !count($result);
}

/**
 * Возвращает путь к директории с файлами данных
 * @return string
 */
function getDataDir()
{
    return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data';
}

/**
 * Возвращает путь к файлу с комментариями
 * @return string
 */
function getDataCommentsPath()
{
    return getDataDir() . DIRECTORY_SEPARATOR . 'comments.txt';
}

/**
 * Считывает массив комментариев из файла
 * @return bool|mixed
 */
function getComments()
{
    $fileComments = getDataCommentsPath();

    if (file_exists($fileComments)) {
        $result = array_map(function ($s) {
            return unserialize($s);
        }, file($fileComments));
        // В начале выводим последние записи
        $result = array_reverse($result);
    } else {
        $result = FALSE;
    }

    return $result;
}

/**
 * Выводит блок с комментарием
 * @param $comment
 */
function displayComment($comment)
{
    ?>
    <article class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><?= htmlentities($comment['name']) ?></h2>
        </div>
        <div class="panel-body">
            <?= $comment['message'] ?>
        </div>
        <div class="panel-footer text-right"><?= htmlentities($comment['date']) ?></div>
    </article>
    <?php
}

/**
 * Добавляет комментарий в файл
 * @param $name
 * @param $message
 * @return bool
 */
function addComment($name, $message)
{
    $fileComments = getDataCommentsPath();

    $handler = fopen($fileComments, 'a');
    if (flock($handler, LOCK_EX)) {
        $date = date('d-m-Y H:i:s');
        $comment = compact('name', 'message', 'date');

        fwrite($handler, serialize($comment) . PHP_EOL);
        flock($handler, LOCK_UN);
        fclose($handler);

        $result = TRUE;
    } else {
        $result = FALSE;
    }

    return $result;
}