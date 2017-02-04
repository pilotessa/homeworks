<?php
/*
 * Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все добавленные
 * комментарии выводятся над текстовым полем.
 */

/**
 * Возвращает путь к директории с файлами данных
 * @return string
 */
function getDataDir()
{
    return __DIR__ . DIRECTORY_SEPARATOR . '7' . DIRECTORY_SEPARATOR . 'data';
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

        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Фильтрация и валидация
    $errors = [];

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    if (!$name) {
        $errors[] = 'Введите имя.';
    }

    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    if (!$message) {
        $errors[] = 'Введите сообщение.';
    }

    //Если все ок, удаляем слова и результат записываем в файл
    if (empty($errors)) {
        $result = addComment($name, $message);
        if ($result) {
            // Успех
            unset($name);
            unset($message);
        } else {
            $error = 'Не могу сохранить комментарий.';
        }
    } else {
        $error = join('<br>', $errors);
    }
}

$comments = getComments();

include 'include/header.php';
?>

    <p class="lead">
        Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все
        добавленные комментарии выводятся над текстовым полем.
    </p>

<?php if (isset($error)): ?>
    <p class="alert alert-danger"><?= htmlentities($error) ?></p>
<?php endif; ?>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $key => $comment): ?>
        <?php displayComment($comment); ?>
    <?php endforeach; ?>
<?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" value="<?= isset($name) ? htmlentities($name) : '' ?>"
                           class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea name="message" id="message" class="form-control"
                              rows="3" required><?= isset($message) ? htmlentities($message) : '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Ок</button>
            </form>
        </div>
    </div>

<?php
include 'include/footer.php';