<?php
/*
 * Дан массив $arr. С помощью первого цикла foreach выведите на экран столбец ключей, с помощью второго — столбец
 * элементов.
 * $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
 */

$arr = ['green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой'];

// Столбец ключей
echo '<h2>Столбец ключей</h2>';
/*
foreach ($arr as $key => $value) { //Вариант 1
    echo "$key<br>\n";
}
*/
foreach (array_keys($arr) as $key) { //Вариант 2
    echo "$key<br>\n";
}

// Столбец элементов
echo '<h2>Столбец элементов</h2>';
foreach ($arr as $value) {
    echo "$value<br>\n";
}