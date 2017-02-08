<?php
/*
 * Вывести таблицу умножения
 */

// Используется двумерный массив и циклы foreach.
// Решение с использованием двух циклов for находится в 28.php

// Инициализируем двумерный массив с индексами от 2 до 9
$start = 2;
$end = 9;
$multiArr = array_fill($start, $end - $start + 1, array_fill($start, $end - $start + 1, 0));
// Заполняем массив значениями
foreach ($multiArr as $multiplier1 => &$multiRow) {
    foreach ($multiRow as $multiplier2 => &$result) {
        $result = $multiplier1 * $multiplier2;
    }
}
// Предотвращаем дальнейшее обращение по ссылке
unset($multiRow);
unset($result);

// Выводим результат в таблицу
echo "<table class=\"table table-bordered\">\n";
echo "<tr>\n";
echo "<th class=\"text-right\">&nbsp;</th>\n";
foreach (array_keys(reset($multiArr)) as $multiplier2) {
    echo "<th class=\"text-right\">{$multiplier2}</th>\n";
}
echo "</tr>\n";
foreach ($multiArr as $multiplier1 => $multiRow) {
    echo "<tr>\n";
    echo "<th class=\"text-right\">{$multiplier1}</th>\n";
    foreach ($multiRow as $multiplier2 => $result) {
        echo "<td class=\"text-right\">{$result}</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";