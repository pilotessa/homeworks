<?php
/*
 * Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что предложения идут
 * в обратном порядке.
 *
 * Входная строка: 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь.
 * А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';
 *
 * Строка, возвращенная функцией : 'А там хоть трава не расти. А ларчик просто открывался. А король-то — голый. А вы
 * друзья как ни садитесь, все в музыканты не годитесь. А воз и ныне там.А Васька слушает да ест.'
 */

function ucfirstSentences($a)
{
    // Разобъем строку на предложения
    $sentences = explode('.', $a);

    // Удаляем пустые элементы
    $sentences = array_filter($sentences);

    // Обратный порядок элементов
    $sentences = array_reverse($sentences);

    // Фикс для получения точки в конце
    $sentences[] = '';

    // Объединяем элементы массива в конечную строку
    return implode('. ', $sentences);
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

    <h2>12.php</h2>
    <p class="lead">
        Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что предложения
        идут в обратном порядке.<br>
        Пример:<br><br>
        Входная строка: 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не
        годитесь. А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';<br><br>
        Строка, возвращенная функцией : 'А там хоть трава не расти. А ларчик просто открывался. А король-то —
        голый. А вы друзья как ни садитесь, все в музыканты не годитесь. А воз и ныне там.А Васька слушает да ест.'
    </p>

    <div class="panel panel-default">
        <div class="panel-body">
            <?php if (isset($error)): ?>
                <p class="alert alert-danger"><?= htmlentities($error) ?></p>
            <?php endif; ?>
            <?php if (isset($result)): ?>
                <p class="alert alert-success"><?= htmlentities($result) ?></p>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="text1">Текст</label>
                    <textarea name="text1" id="text1" class="form-control" rows="3"
                              required><?= isset($text1) ? htmlentities($text1) : '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Ок</button>
            </form>
        </div>
    </div>

<?php
include 'include/footer.php';