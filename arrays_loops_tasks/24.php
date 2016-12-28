<?php
/*
 * Вам нужно разработать программу, которая считала бы количество вхождений какой­нибуть выбранной вами цифры в
 * выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза.
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = isset($_POST['number']) ? $_POST['number'] : false;
    $digit = isset($_POST['digit']) ? $_POST['digit'] : false;
    if (is_numeric($number) && is_numeric($digit)) {
        // Int -> string -> array
        $digits = str_split(strval($number));
        $counts = array_count_values($digits);
        $count = isset($counts[$digit]) ? $counts[$digit] : 0;
        $result = "<p>Число {$number} содержит {$count} вхождений цифры {$digit}</p>\n";
    } else {
        $result = "<p>Неверный ввод</p>\n";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>24</title>
</head>
<body>
<?=isset($result) ? $result : ''?>
<form method="post">
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
</body>
</html>