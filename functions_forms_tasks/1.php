<?php
/*
 * Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать только те слова, которые есть и
 * в первом и во втором поле ввода. Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b), которая
 * будет возвращать массив с общими словами.
 */

function getCommonWords($a, $b) {
    // Удалим знаки пунктуации
    $punctuation = ['.', ',', ';', ':', '-', '!', '?'];
    $aFiltered = str_replace($punctuation, '', $a);
    $bFiltered = str_replace($punctuation, '', $b);

    // Разобъем строку на слова
    $arrA = explode(' ', $aFiltered);
    $arrB = explode(' ', $bFiltered);

    // Удаляем пустые элементы
    $arrA = array_filter($arrA);
    $arrB = array_filter($arrB);

    // Возвращаем схождение массивов
    return array_intersect($arrA, $arrB);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text1 = filter_input(INPUT_GET, 'text1', FILTER_SANITIZE_STRING);
    $text2 = filter_input(INPUT_GET, 'text2', FILTER_SANITIZE_STRING);

    if ($text1 && $text2) {
        $result = getCommonWords($text1, $text2);
    } else {
        $error = 'Введите текст 1 и текст 2.';
    }
}

include 'include/header.php';
?>

<h2>1.php</h2>
<p class="lead">
    Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать только те слова, которые есть и
    в первом и во втором поле ввода. Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b),
    которая будет возвращать массив с общими словами.
</p>

<?php
include 'include/footer.php';