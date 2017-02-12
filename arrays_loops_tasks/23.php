<?php
/*
 * Вам нужно разработать программу, которая считала бы сумму цифр числа введенного пользователем. Например: есть число
 * 123, то программа должна вычислить сумму цифр 1, 2, 3, т. е. 6.
 * По желанию можете сделать проверку на корректность введения данных пользователем.
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = isset($_POST['number']) ? $_POST['number'] : false;
    if (is_numeric($number)) {
        // String -> array
        $digits = str_split($number);
        $sum = array_sum($digits);
        $result = "<p>Сумма цифр числа {$number} равняется {$sum}</p>\n";
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
        <button>Вперед!</button>
    </p>
</form>