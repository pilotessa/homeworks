<?php
/*
 * Вам нужно разработать программу, которая считала бы количество вхождений какой­нибуть выбранной вами цифры в
 * выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза.
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = isset($_POST['number']) ? $_POST['number'] : false;
    $digit = isset($_POST['digit']) ? $_POST['digit'] : false;
    if (is_numeric($number) && is_numeric($digit) && strlen($digit) == 1) {
        // String -> array
        $digits = str_split($number);
        $counts = array_count_values($digits);
        $count = isset($counts[$digit]) ? $counts[$digit] : 0;
        $result = "<p>Число {$number} содержит {$count} вхождений цифры {$digit}</p>\n";
    } else {
        $result = "<p>Неверный ввод</p>\n";
    }
}
?>
<?= isset($result) ? $result : '' ?>
<form action="" method="post">
    <p>
        <label for="number">Введите число</label><br>
        <input type="text" name="number" id="number">
    </p>
    <p>
        <label for="digit">Введите цифру</label><br>
        <input type="text" name="digit" id="digit">
    </p>
    <p>
        <button>Вперед!</button>
    </p>
</form>