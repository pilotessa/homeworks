<?php
/*
 * Функции для работы с комментариями
 */

/**
 * Возвращает список запрещенных слов
 * @return array
 */
function getForbiddenWords()
{
    return preg_split('/\W+/u', getWords(), -1, PREG_SPLIT_NO_EMPTY);
}

/**
 * Проверяет наличие запрещенных слов в строке
 * @param $string
 * @return bool
 */
function checkForbiddenWords($string)
{
    global $delimiters;

    // Разбиваем строку на слова
    $parts = preg_split('/\W+/u', $string, -1, PREG_SPLIT_NO_EMPTY);
    // Переводим слова в нижний регистр
    $parts = array_map('mb_strtolower', $parts);

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
 * Возвращает путь к файлу с запрещенными словами
 * @return string
 */
function getDataWordsPath()
{
    return getDataDir() . DIRECTORY_SEPARATOR . 'words.txt';
}

/**
 * Считывает массив комментариев из файла
 * @return bool|array
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
        $result = false;
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
            <?= htmlentities($comment['message']) ?>
        </div>
        <div class="panel-footer text-right">
            <small><?= htmlentities($comment['date']) ?></small>
        </div>
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

        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

/**
 * Считывает запрещенные слова из файла
 * @return string
 */
function getWords()
{
    $fileWords = getDataWordsPath();

    if (file_exists($fileWords)) {
        $result = file_get_contents($fileWords);
    } else {
        $result = '';
    }

    return $result;
}

/**
 * Обновляет список запрещенных слов
 * @param $words
 * @return bool
 */
function updateWords($words)
{
    // Переводим список слов в нижний регистр
    $words = mb_strtolower($words);
    return file_put_contents(getDataWordsPath(), $words);
}

/**
 * Возвращает данные о текущем пользователе
 * @return string|bool
 */
function getUser()
{
    return isset($_SESSION['user']) ? $_SESSION['user'] : false;
}

/**
 * @param $login
 * @param $password
 * @return string|bool
 */
function authenticate($login, $password)
{
    if ($login == 'admin' && $password == 'password') {
        $_SESSION['user'] = $login;
        $result = $login;
    } else {
        $result = false;
    }

    return $result;
}

/**
 * Удаляет данные о текущем пользователе из сессии
 * @return bool
 */
function logout()
{
    unset($_SESSION['user']);
    return false;
}