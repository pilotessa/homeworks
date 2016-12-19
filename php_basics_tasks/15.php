<?php
/*
 * Написать калькулятор. Переменная $a = изменяемое число. Переменная $b = изменяемое число. Переменная $operator = ‘+’
 * или ‘-’ или ‘/’ или ‘*’ или '%' (остаток от деления). На экран выводить результат в зависимости от значений этих
 * переменных. Не забудьте про деление на 0, если надо - выдавать ошибку что на 0 делить нельзя.
 */

if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['operator'])) {
    $a = filter_var($_GET['a'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $b = filter_var($_GET['b'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $operator = filter_var($_GET['operator'], FILTER_SANITIZE_STRING);
    echo "{$a} {$operator} {$b} = ";

    switch ($operator) {
        case '+':
            echo $a + $b;
            break;
        case '-':
            echo $a - $b;
            break;
        case '/':
            if (!$b) {
                echo 'Error';
            } else {
                echo $a / $b;
            }
            break;
        case '*':
            echo $a * $b;
            break;
        case '%':
            if (!$b) {
                echo 'Error';
            } else {
                echo $a % $b;
            }
            break;
        default:
            echo 'Error';
    }
}