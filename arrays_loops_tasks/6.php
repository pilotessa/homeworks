<?php
/*
 * Дан массив $arr. С помощью цикла foreach запишите английские названия в массив $en, а русские — в массив $ru.
 * $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
 * $en = array('green', 'red','blue');
 * $ru = array('зеленый', 'красный', 'голубой');
 */

// Инициализируем массивов
$arr = ['green' => 'зеленый', 'red' => 'красный','blue' => 'голубой'];
$en = [];
$ru = [];

// Заполняем массивы
foreach ($arr as $itemEn => $itemRu) {
    $en[] = $itemEn;
    $ru[] = $itemRu;
}

// Выводим $en
echo '<h2>Английские названия</h2>';
echo '<pre>';
print_r($en);
echo '</pre>';

// Выводим $ru
echo '<h2>Русские названия</h2>';
echo '<pre>';
print_r($ru);
echo '</pre>';