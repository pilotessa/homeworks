<?php
/*
 * Есть строка $string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша
 * яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня
 * вишня черешня черешня груша яблоко черешня вишня';
 *
 * Подсчитайте, сколько раз каждый фрукт встречается в этой строке. Выведите в виде списка в порядке уменьшения
 * количества:
 *
 * Пример вывода:
 * яблоко – 12
 * черешня – 8
 * груша – 5
 * слива - 3
 */

function arrayCountValuesTop($a)
{
    // Разобъем строку на слова
    $arrA = explode(' ', $a);

    // Подсчет количества значений
    $arrA = array_count_values($arrA);

    // Сортируем по убыванию
    arsort($arrA);

    // Возвращаем полученный массив
    return $arrA;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text1 = filter_input(INPUT_POST, 'text1', FILTER_SANITIZE_STRING);

    if ($text1) {
        $result = arrayCountValuesTop($text1);
    } else {
        $error = 'Введите текст.';
    }
}

include 'include/header.php';
?>

    <h2>13.php</h2>
    <p class="lead">
        Есть строка $string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня
        груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня
        яблоко вишня вишня черешня черешня груша яблоко черешня вишня';<br>
        <br>
        Подсчитайте, сколько раз каждый фрукт встречается в этой строке. Выведите в виде списка в порядке уменьшения
        количества:<br><br>

        Пример вывода:<br>
        яблоко – 12<br>
        черешня – 8<br>
        груша – 5<br>
        слива - 3<br>
    </p>

    <div class="panel panel-default">
        <div class="panel-body">
            <?php if (isset($error)): ?>
                <p class="alert alert-danger"><?= htmlentities($error) ?></p>
            <?php endif; ?>
            <?php if (isset($result)): ?>
                <p class="alert alert-success">
                    <?php foreach ($result as $key => $value): ?>
                        <?= htmlentities($key) . ' – ' . htmlentities($value) . '<br>' ?>
                    <?php endforeach; ?>
                </p>
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