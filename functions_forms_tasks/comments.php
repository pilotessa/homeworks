<?php
/*
 * Написать самостоятельно контактную форму, для ввода-хранения-вывода комментариев. Стилизовать форму и вывод
 * комментариев. Реализовать решение по добавлению слов в «антимат» с помощью отдельной формы и хранить их в отдельном
 * файле.
 */

// Подключаем функции для работы с комментариями
require_once 'comments/libraries/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Фильтрация и валидация
    $errors = [];

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    if (!$name) {
        $errors[] = 'Введите имя.';
    } elseif (!checkForbiddenWords($name)) {
        $errors[] = 'Некорректный комментарий.';
    }

    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    if (!$message) {
        $errors[] = 'Введите сообщение.';
    } elseif (!checkForbiddenWords($message)) {
        $errors[] = 'Некорректный комментарий.';
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

// Подключаем шаблон страницы
include 'comments/pages/view.php';