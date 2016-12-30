<?php
/*
 * Ваше задание создать массив, наполнить это случайными значениями (функция rand), найти максимальное и минимальное
 * значение и поменять их местами.
 */

// Генерируем массив
$arr = [];
for ($i = 0; $i < 10; $i++) {
    $arr[] = rand(1, 100);
}
echo '<p>Исходный массив</p>';
echo '<pre>';
print_r($arr);
echo '</pre>';

// Находим максимальное и минимальное значения
$indexMax = array_search(max($arr), $arr);
$indexMin = array_search(min($arr), $arr);
echo "<p>Максимальное значение: {$arr[$indexMax]}</p>";
echo "<p>Минимальное значение: {$arr[$indexMin]}</p>";

// Меняем их местами
//list($arr[$indexMin], $arr[$indexMax]) = [$arr[$indexMax], $arr[$indexMin]]; // Вариант 1
$arr[$indexMax] = $arr[$indexMax] + $arr[$indexMin] - ($arr[$indexMin] = $arr[$indexMax]); // Вариант 2
echo '<p>Полученный массив</p>';
echo '<pre>';
print_r($arr);
echo '</pre>';