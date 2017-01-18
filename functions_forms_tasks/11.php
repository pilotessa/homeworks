<?php
/*
 * Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что каждое новое
 * предложение начиняется с большой буквы.
 */

function ucfirstSentences($a) {
    // Разобъем строку на предложения
    $sentences = explode('.', $a);

    // Переводим первый непробельный символ в верхний регистр
    foreach ($sentences as &$sentence) {
        $sentenceTrimmed = ltrim($sentence); // Удаляем пробелы слева
        if (mb_strlen($sentence) && mb_strlen($sentenceTrimmed)) { // Пустые строки не преобразовываем
            if (mb_strlen($sentence) && mb_strlen($sentenceTrimmed)) { // Строка стала короче?
                $spaces = str_repeat(' ', mb_strlen($sentence) - mb_strlen($sentenceTrimmed)); // Нужно вернуть пробелы
            } else {
                $spaces = '';
            }
            $sentence = $spaces . mb_strtoupper(mb_substr($sentenceTrimmed, 0, 1)) . mb_substr($sentenceTrimmed, 1);
        }
    }

    // Объединяем элементы массива в конечную строку
    return implode('.', $sentences);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text1 = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_STRING);

    if ($text1) {
        $result = ucfirstSentences($text1);
    } else {
        $error = 'Введите текст.';
    }
}

include 'include/header.php';
?>

    <h2>11.php</h2>
    <p class="lead">
        Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что каждое
        новое предложение начиняется с большой буквы.<br>
        Пример:<br><br>
        Входная строка: 'а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не
        годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';<br><br>
        Строка, возвращенная функцией :  'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в
        музыканты не годитесь. А король-то — голый. А ларчик просто открывался.А там хоть трава не расти.';
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