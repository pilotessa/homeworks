<?php
/*
 * Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте. Реализовать
 * с помощью функции.
 */

function getTop3Words($a) {
    // Удалим знаки пунктуации
    $punctuation = ['.', ',', ';', ':', '–', '- ', '!', '?'];
    $aFiltered = str_replace($punctuation, ' ', $a);

    // Разобъем строку на слова
    $arrA = explode(' ', $aFiltered);

    // Удаляем пустые элементы
    $arrA = array_filter($arrA);

    // Удаляем повторяющиеся элементы
    $arrA = array_unique($arrA);

    // Сортируем массив по длине слов
    uasort ($arrA, function($a, $b) {
        if (strlen($a) == strlen($b)) {
            return 0;
        }
        return (strlen($a) > strlen($b)) ? -1 : 1;
    });

    // Возвращаем три первых элемента
    return array_slice($arrA, 0, 3);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text1 = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_STRING);

    if ($text1) {
        $result = getTop3Words($text1);
    } else {
        $error = 'Введите текст 1.';
    }
}

include 'include/header.php';
?>

    <h2>2.php</h2>
    <p class="lead">
        Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте.
        Реализовать с помощью функции.
    </p>

    <div class="panel panel-default">
        <div class="panel-body">
            <?php if (isset($error)): ?>
                <p class="alert alert-danger"><?=$error?></p>
            <?php endif; ?>
            <?php if (isset($result)): ?>
                <pre><?php print_r($result); ?></pre>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="text1">Текст 1</label>
                    <textarea name="text1" id="text1" class="form-control" rows="3"><?=isset($text1) ? $text1 : ''?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Ок</button>
            </form>
        </div>
    </div>

<?php
include 'include/footer.php';