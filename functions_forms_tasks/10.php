<?php
/*
 * Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются пробелами. Текст должен
 * вводиться с формы.
 */

function uniqueWordsCount($a) {
    // Удалим знаки пунктуации
    $punctuation = ['.', ',', ';', ':', '–', '- ', '!', '?', '"'];
    $aFiltered = str_replace($punctuation, ' ', $a);

    // Разобъем строку на слова
    $arrA = explode(' ', $aFiltered);

    // Удаляем пустые элементы
    $arrA = array_filter($arrA);

    // Удаляем повторяющиеся элементы
    $arrA = array_unique($arrA);

    // Возвращаем длину массива уникальных слов
    return count($arrA);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text1 = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_STRING);

    if ($text1) {
        $result = uniqueWordsCount($text1);
    } else {
        $error = 'Введите текст.';
    }
}

include 'include/header.php';
?>

    <h2>10.php</h2>
    <p class="lead">
        Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются пробелами. Текст должен
        вводиться с формы.
    </p>

    <div class="panel panel-default">
        <div class="panel-body">
            <?php if (isset($error)): ?>
                <p class="alert alert-danger"><?=$error?></p>
            <?php endif; ?>
            <?php if (isset($result)): ?>
                <p class="alert alert-success"><?=$result?></p>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="text1">Текст</label>
                    <textarea name="text1" id="text1" class="form-control" rows="3"><?=isset($text1) ? $text1 : ''?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Ок</button>
            </form>
        </div>
    </div>

<?php
include 'include/footer.php';