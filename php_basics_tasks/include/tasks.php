<?php
$currentTask = !empty($_GET['task']) ? intval($_GET['task']) : 0;
?>
<div class="list-group">
    <a href="show.php?task=1" class="list-group-item<?= $currentTask == '1' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">1.php</h3>
        <p class="list-group-item-text">Создайте переменную name и присвойте ей значение, содержащее ваше имя, например
            "Иннокентий".</p>
    </a>
    <a href="show.php?task=2" class="list-group-item<?= $currentTask == '2' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">2.php</h3>
        <p class="list-group-item-text">Создайте переменную age и присвойте ей значение, содержащее ваш возраст,
            например 20.</p>
    </a>
    <a href="show.php?task=3" class="list-group-item<?= $currentTask == '3' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">3.php</h3>
        <p class="list-group-item-text">Выведите с помощью echo фразу "Меня зовут: %ваше_имя%", например: "Меня зовут:
            Иннокентий".</p>
    </a>
    <a href="show.php?task=4" class="list-group-item<?= $currentTask == '4' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">4.php</h3>
        <p class="list-group-item-text">Выведите фразу "Мне %ваш_возраст% лет", например: "Мне 20 лет".</p>
    </a>
    <a href="show.php?task=5" class="list-group-item<?= $currentTask == '5' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">5.php</h3>
        <p class="list-group-item-text">Напишите конструкцию if, которая выводит фразу: "Вам еще работать и работать"
            при условии, что значение переменной age попадает в диапазон чисел от 18 до 59 (включительно).</p>
    </a>
    <a href="show.php?task=6" class="list-group-item<?= $currentTask == '6' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">6.php</h3>
        <p class="list-group-item-text">Расширьте конструкцию if из п.5, выводя фразу: "Вам пора на пенсию" при условии,
            что значение переменной age больше 59.</p>
    </a>
    <a href="show.php?task=7" class="list-group-item<?= $currentTask == '7' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">7.php</h3>
        <p class="list-group-item-text">Расширьте конструкцию if из п.5-6, выводя фразу: "Вам еще рано работать" при
            условии, что значение переменной age попадает в диапазон чисел от 0 до 17 (включительно).</p>
    </a>
    <a href="show.php?task=8" class="list-group-item<?= $currentTask == '8' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">8.php</h3>
        <p class="list-group-item-text">Расширьте конструкцию if из п.5-7, выводя фразу: "Неизвестный возраст" при
            условии, что значение переменной age является отрицательным числом, или вовсе числом не является.</p>
    </a>
    <a href="show.php?task=9" class="list-group-item<?= $currentTask == '9' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">9.php</h3>
        <p class="list-group-item-text">Создайте переменную day и присвойте ей произвольное числовое значение.</p>
    </a>
    <a href="show.php?task=10" class="list-group-item<?= $currentTask == '10' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">10.php</h3>
        <p class="list-group-item-text">С помощью конструкции switch выведите фразу: "Это рабочий день", если значение
            переменной day попадает в диапазон чисел от 1 до 5 (включительно).</p>
    </a>
    <a href="show.php?task=11" class="list-group-item<?= $currentTask == '11' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">11.php</h3>
        <p class="list-group-item-text">С помощью конструкции switch выведите фразу: "Это выходной день", если значение
            переменной day попадает в диапазон чисел от 6 до 7 (включительно).</p>
    </a>
    <a href="show.php?task=12" class="list-group-item<?= $currentTask == '12' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">12.php</h3>
        <p class="list-group-item-text">С помощью конструкции switch выведите фразу: "Неизвестный день", если значение
            переменной day не попадает в диапазон чисел от 1 до 7 (включительно).</p>
    </a>
    <a href="show.php?task=13" class="list-group-item<?= $currentTask == '13' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">13.php</h3>
        <p class="list-group-item-text">Заданы две переменные: s - длина участка, который проехал автомобиль; t - время
            движения в часах. Вывести скорость автомобиля на заданном участке в км/час и в м/сек.</p>
    </a>
    <a href="show.php?task=14" class="list-group-item<?= $currentTask == '14' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">14.php</h3>
        <p class="list-group-item-text">Задана переменная $foo = 'bar'; Создать переменную bar, в которой будет
            храниться число 10. Вывести число 10, используя только переменную $foo (не опечатка).</p>
    </a>
    <a href="show.php?task=15" class="list-group-item<?= $currentTask == '15' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">15.php</h3>
        <p class="list-group-item-text">Написать калькулятор. Переменная $a = изменяемое число. Переменная $b =
            изменяемое число. Переменная $operator = ‘+’ или ‘-’ или ‘/’ или ‘*’ или '%' (остаток от деления). На экран
            выводить результат в зависимости от значений этих переменных. Не забудьте про деление на 0, если
            надо - выдавать ошибку что на 0 делить нельзя.</p>
    </a>
    <a href="show.php?task=16" class="list-group-item<?= $currentTask == '16' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">16.php</h3>
        <p class="list-group-item-text">Создайте две переменные $a и $b, значения которых будут числами. Выведите
            максимальное число из этих двух.</p>
    </a>
    <a href="show.php?task=17" class="list-group-item<?= $currentTask == '17' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">17.php</h3>
        <p class="list-group-item-text">Создайте две переменные $a = '78' (строковый тип) и $b = 78 (целочисленный тип).
            Проверьте эти две переменные на равность, с помощью if выведите "равны" или "не равны".</p>
    </a>
    <a href="show.php?task=18" class="list-group-item<?= $currentTask == '18' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">18.php</h3>
        <p class="list-group-item-text">Создайте две переменные $a = '78' (строковый тип) и $b = 78 (целочисленный тип).
            Проверьте эти две переменные на эквивалентность, с помощью if выведите "эквивалентны" или "не
            эквивалентны".</p>
    </a>
    <a href="show.php?task=19" class="list-group-item<?= $currentTask == '19' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">19.php</h3>
        <p class="list-group-item-text">Выведите результат сравнения $a и $b из п.17 с помощью var_dump.</p>
    </a>
    <a href="show.php?task=20" class="list-group-item<?= $currentTask == '20' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">20.php</h3>
        <p class="list-group-item-text">Приведите число 20 к типу boolean. Объясните результат.</p>
    </a>
    <a href="show.php?task=21" class="list-group-item<?= $currentTask == '21' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">21.php</h3>
        <p class="list-group-item-text">Приведите число 0 к типу boolean. Объясните результат.</p>
    </a>
    <a href="show.php?task=22" class="list-group-item<?= $currentTask == '22' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">22.php</h3>
        <p class="list-group-item-text">Приведите число -20 к типу boolean. Объясните результат.</p>
    </a>
    <a href="show.php?task=23" class="list-group-item<?= $currentTask == '23' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">23.php</h3>
        <p class="list-group-item-text">Напишите 3 строки, используя три разные функции для вывода текста.</p>
    </a>
    <a href="show.php?task=24" class="list-group-item<?= $currentTask == '24' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">24.php</h3>
        <p class="list-group-item-text">Создайте в файле 3 комментария тремя разными типами.</p>
    </a>
    <a href="show.php?task=25" class="list-group-item<?= $currentTask == '25' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">25.php</h3>
        <p class="list-group-item-text">Приведите пример, чем отличается &lt;?php от &lt;?=.</p>
    </a>
    <a href="show.php?task=26" class="list-group-item<?= $currentTask == '26' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">26.php</h3>
        <p class="list-group-item-text">Объявите константу DAYS_COUNT равную 7 и константу MONTH_COUNT равную 12 двумя
            разными способами объявления констант.</p>
    </a>
    <div class="list-group-item">
        <h3 class="list-group-item-heading">27.php</h3>
        <p class="list-group-item-text">Выполните скрипт по задаче №4 из консоли (необходимо запустить php скрипт по
            задаче №4 из командной строки).</p>
    </div>
</div>