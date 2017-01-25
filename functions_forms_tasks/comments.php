<?php
/*
 * Написать самостоятельно контактную форму, для ввода-хранения-вывода комментариев. Стилизовать форму и вывод
 * комментариев. Реализовать решение по добавлению слов в «антимат» с помощью отдельной формы и хранить их в отдельном
 * файле.
 */

session_start();

// Подключаем функции для работы с комментариями
require_once 'comments/libraries/functions.php';

// Получаем текущее действие (по умолчанию 'view')
$action = isset($_GET['action']) ? $_GET['action'] : 'view';

switch ($action) {
    case 'view':
        // Добавляем комментарий
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
                    $success = 'Комментарий добавлен.';
                } else {
                    $error = 'Не могу сохранить комментарий.';
                }
            } else {
                $error = join('<br>', $errors);
            }
        }

        // Получаем список комментариев
        $comments = getComments();
        // Подключаем шаблон страницы
        include 'comments/pages/view.php';

        break;
    case 'admin':
        // Только для авторизованных пользователей
        if ($user = getUser()) {
            // Обновляем список запрещенных слов
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $words = filter_input(INPUT_POST, 'words', FILTER_SANITIZE_STRING);
                if (!$words) {
                    $error = 'Введите список слов.';
                } else {
                    $result = updateWords($words);
                    if ($result) {
                        $success = 'Настройки сохранены.';
                    } else {
                        $error = 'Не могу сохранить список слов.';
                    }
                }
            }

            // Получаем список запрещенных слов
            $words = getWords();
            // Подключаем шаблон страницы
            include 'comments/pages/admin.php';
        } else {
            // Пользователь не авторизован
            header("HTTP/1.0 403 Forbidden");
            $error = 'Вы не авторизованы.';
            include 'comments/pages/error.php';
        }

        break;
    case 'login':
        // Авторизация
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Фильтрация и валидация
            $errors = [];

            $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            if (!$login) {
                $errors[] = 'Введите имя пользователя.';
            }

            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            if (!$password) {
                $errors[] = 'Введите пароль.';
            }

            //Если все ок, выполняем процедуру авторизации
            if (empty($errors)) {
                $user = authenticate($login, $password);
                if (!$user) {
                    $error = 'Неверное имя пользователя или пароль.';
                }
            } else {
                $error = join('<br>', $errors);
            }
        } else {
            // Текущий пользователь
            $user = getUser();
        }

        // Подключаем шаблон страницы
        include 'comments/pages/login.php';

        break;
    default:
        // Страница не найдена
        header("HTTP/1.0 404 Not Found");
        $error = 'Страница не найдена.';
        include 'comments/pages/error.php';

        break;
}