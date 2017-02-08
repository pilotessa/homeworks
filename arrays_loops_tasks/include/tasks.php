<?php
$currentTask = !empty($_GET['task']) ? intval($_GET['task']) : 0;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Работа с foreach</h3>
    </div>
    <div class="list-group">
        <a href="show.php?task=1" class="list-group-item<?= $currentTask == '1' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">1.php</h3>
            <p class="list-group-item-text">Дан массив с элементами 'html', 'css', 'php', 'js', 'jq'. С помощью цикла
                foreach выведите эти слова в столбик.</p>
        </a>
        <a href="show.php?task=2" class="list-group-item<?= $currentTask == '2' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">2.php</h3>
            <p class="list-group-item-text">Дан массив с элементами 1, 20, 15, 17, 24, 35. С помощью цикла foreach
                найдите сумму элементов этого массива. Запишите ее в переменную $result.</p>
        </a>
        <a href="show.php?task=3" class="list-group-item<?= $currentTask == '3' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">3.php</h3>
            <p class="list-group-item-text">Дан массив с элементами 26, 17, 136, 12, 79, 15. С помощью цикла foreach
                найдите сумму квадратов элементов этого массива. Результат запишите в переменную $result.</p>
        </a>
    </div>
    <div class="panel-heading">
        <h3 class="panel-title">Работа с ключами</h3>
    </div>
    <div class="list-group">
        <a href="show.php?task=4" class="list-group-item<?= $currentTask == '4' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">4.php</h3>
            <p class="list-group-item-text">Дан массив $arr. С помощью первого цикла foreach выведите на экран столбец
                ключей, с помощью второго — столбец элементов.<br><br>
                $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');</p>
        </a>
        <a href="show.php?task=5" class="list-group-item<?= $currentTask == '5' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">5.php</h3>
            <p class="list-group-item-text">Дан массив $arr с ключами 'Коля', 'Вася', 'Петя' с элементами '200', '300',
                '400'. С помощью цикла foreach выведите на экран столбец строк такого формата: 'Коля — зарплата 200
                долларов.'.</p>
        </a>
        <a href="show.php?task=6" class="list-group-item<?= $currentTask == '6' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">6.php</h3>
            <p class="list-group-item-text">Дан массив $arr. С помощью цикла foreach запишите английские названия в
                массив $en, а русские — в массив $ru.<br><br>
                $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');<br>
                $en = array('green', 'red','blue');<br>
                $ru = array('зеленый', 'красный', 'голубой');</p>
        </a>
        <a href="show.php?task=7" class="list-group-item<?= $currentTask == '7' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">7.php</h3>
            <p class="list-group-item-text">Дан массив с элементами 2, 5, 9, 15, 0, 4. С помощью цикла foreach и
                оператора if выведите на экран столбец тех элементов массива, которые больше 3­х, но меньше 10.</p>
        </a>
        <a href="show.php?task=8" class="list-group-item<?= $currentTask == '8' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">8.php</h3>
            <p class="list-group-item-text">Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. С помощью цикла foreach
                создайте строку '­1­2­3­4­5­6­7­8­9­'.</p>
        </a>
    </div>
    <div class="panel-heading">
        <h3 class="panel-title">Циклы while и for</h3>
    </div>
    <div class="list-group">
        <a href="show.php?task=9" class="list-group-item<?= $currentTask == '9' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">9.php</h3>
            <p class="list-group-item-text">Выведите столбец чисел от 1 до 100.</p>
        </a>
        <a href="show.php?task=10" class="list-group-item<?= $currentTask == '10' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">10.php</h3>
            <p class="list-group-item-text">Выведите столбец чисел от 11 до 33.</p>
        </a>
        <a href="show.php?task=11" class="list-group-item<?= $currentTask == '11' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">11.php</h3>
            <p class="list-group-item-text">Выведите столбец четных чисел в промежутке от нуля до 100.</p>
        </a>
        <a href="show.php?task=12" class="list-group-item<?= $currentTask == '12' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">12.php</h3>
            <p class="list-group-item-text">Дано число $n = 1000. Делите его на 2 столько раз, пока результат деления не
                станет меньше 50. Какое число получится? Посчитайте количество итераций, необходимых для этого (итерации
                — это количество проходов цикла), и запишите его в переменную $num.</p>
        </a>
        <a href="show.php?task=13" class="list-group-item<?= $currentTask == '13' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">13.php</h3>
            <p class="list-group-item-text">Вывести таблицу умножения</p>
        </a>
        <a href="show.php?task=14" class="list-group-item<?= $currentTask == '14' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">14.php</h3>
            <p class="list-group-item-text">Дан массив с элементами 4, 2, 5, 19, 13, 0, 10. С помощью цикла foreach и
                оператора if проверьте есть ли в массиве элемент со значением $e, равном 2, 3 или 4. Если есть —
                выведите на экран 'Есть!', иначе выведите 'Нет!'.</p>
        </a>
        <a href="show.php?task=15" class="list-group-item<?= $currentTask == '15' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">15.php</h3>
            <p class="list-group-item-text">Дан массив $arr. С помощью цикла foreach и переменной $count подсчитайте
                количество элементов этого массива. Проверьте работу скрипта на примере массива с элементами 4, 2, 5,
                19, 13, 0, 10.</p>
        </a>
        <a href="show.php?task=16" class="list-group-item<?= $currentTask == '16' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">16.php</h3>
            <p class="list-group-item-text">Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. С помощью цикла foreach и
                оператора if выведите на экран столбец элементов массива, как показано на картинке.<br><br>
                1, 2, 3<br>
                4, 5, 6<br>
                7, 8, 9</p>
        </a>
        <a href="show.php?task=17" class="list-group-item<?= $currentTask == '17' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">17.php</h3>
            <p class="list-group-item-text">Составьте массив месяцев. С помощью цикла foreach выведите все месяцы, а
                текущий месяц выведите жирным. Текущий месяц должен храниться в переменной $month.</p>
        </a>
        <a href="show.php?task=18" class="list-group-item<?= $currentTask == '18' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">18.php</h3>
            <p class="list-group-item-text">Составьте массив дней недели. С помощью цикла foreach выведите все дни
                недели, выходные дни следует вывести жирным.</p>
        </a>
        <a href="show.php?task=19" class="list-group-item<?= $currentTask == '19' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">19.php</h3>
            <p class="list-group-item-text">Составьте массив дней недели. С помощью цикла foreach выведите все дни
                недели, а
                текущий день выведите курсивом. Текущий день должен храниться в переменной $day.</p>
        </a>
        <a href="show.php?task=20" class="list-group-item<?= $currentTask == '20' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">20.php</h3>
            <p class="list-group-item-text">Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно
                быть 20 рядов, а не 5.<br><br>
                x<br>
                xx<br>
                xxx<br>
                xxxx<br>
                xxxxx</p>
        </a>
        <a href="show.php?task=21" class="list-group-item<?= $currentTask == '21' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">21.php</h3>
            <p class="list-group-item-text">Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно
                быть 9 рядов, а не 5.<br><br>
                1<br>
                22<br>
                333<br>
                4444<br>
                55555</p>
        </a>
        <a href="show.php?task=22" class="list-group-item<?= $currentTask == '22' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">22.php</h3>
            <p class="list-group-item-text">Нарисуйте пирамиду, как показано на рисунке, воспользовавшись циклом for или
                while.<br><br>
                xx<br>
                xxxx<br>
                xxxxxx<br>
                xxxxxxxx<br>
                xxxxxxxxxx</p>
        </a>
        <a href="show.php?task=23" class="list-group-item<?= $currentTask == '23' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">23.php</h3>
            <p class="list-group-item-text">Вам нужно разработать программу, которая считала бы сумму цифр числа
                введенного пользователем. Например: есть число 123, то программа должна вычислить сумму цифр 1, 2, 3, т.
                е. 6.<br>
                По желанию можете сделать проверку на корректность введения данных пользователем.</p>
        </a>
        <a href="show.php?task=24" class="list-group-item<?= $currentTask == '24' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">24.php</h3>
            <p class="list-group-item-text">Вам нужно разработать программу, которая считала бы количество вхождений
                какой­нибуть выбранной вами цифры в выбранном вами числе. Например: цифра 5 в числе 442158755745
                встречается 4 раза.</p>
        </a>
        <a href="show.php?task=25" class="list-group-item<?= $currentTask == '25' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">25.php</h3>
            <p class="list-group-item-text">Ваше задание создать массив, наполнить это случайными значениями (функция
                rand), найти максимальное и минимальное значение и поменять их местами.</p>
        </a>
        <a href="show.php?task=26" class="list-group-item<?= $currentTask == '26' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">26.php</h3>
            <p class="list-group-item-text">Вам нужно создать массив и заполнить его случайными числами от 1 до 100 (ф­я
                rand). Далее, вычислить произведение тех элементов, которые больше ноля и у которых парные индексы.
                После вывести на экран элементы, которые больше ноля и у которых не парный индекс.</p>
        </a>
        <a href="show.php?task=27" class="list-group-item<?= $currentTask == '27' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">27.php</h3>
            <p class="list-group-item-text">Создать генератор случайных таблиц. Есть переменные: $row - кол-во строк в
                таблице, $cols - кол-во столбцов в таблице. Есть список цветов, в массиве: $colors =
                array('red','yellow','blue','gray','maroon','brown','green'). Необходимо создать скрипт, который по
                заданным условиям выведет таблицу размера $rows на $cols, в которой все ячейки будут иметь цвета,
                выбранные случайным образом из массива $colors. В каждой ячейке должно находиться случайное число.
                <?php if (empty($currentTask)): ?>
                <br><br>
                Пример результата:<br><br>
            <table>
                <tr>
                    <td style='background-color:blue'>2033</td>
                    <td style='background-color:brown'>11696</td>
                    <td style='background-color:green'>712</td>
                    <td style='background-color:yellow'>32583</td>
                    <td style='background-color:red'>157</td>
                </tr>
                <tr>
                    <td style='background-color:gray'>25694</td>
                    <td style='background-color:red'>19724</td>
                    <td style='background-color:brown'>18487</td>
                    <td style='background-color:brown'>8462</td>
                    <td style='background-color:red'>4412</td>
                </tr>
                <tr>
                    <td style='background-color:gray'>4673</td>
                    <td style='background-color:gray'>14450</td>
                    <td style='background-color:maroon'>16748</td>
                    <td style='background-color:gray'>3505</td>
                    <td style='background-color:maroon'>5299</td>
                </tr>
                <tr>
                    <td style='background-color:red'>16873</td>
                    <td style='background-color:gray'>21370</td>
                    <td style='background-color:green'>22482</td>
                    <td style='background-color:red'>28576</td>
                    <td style='background-color:blue'>26060</td>
                </tr>
                <tr>
                    <td style='background-color:yellow'>28955</td>
                    <td style='background-color:gray'>8804</td>
                    <td style='background-color:gray'>26825</td>
                    <td style='background-color:red'>31471</td>
                    <td style='background-color:blue'>22283</td>
                </tr>
            </table>
            <?php endif; ?>
            </p>
        </a>
        <a href="show.php?task=28" class="list-group-item<?= $currentTask == '28' ? ' active' : '' ?>">
            <h3 class="list-group-item-heading">28.php</h3>
            <p class="list-group-item-text">Вывести таблицу умножения с помощью двух циклов for.</p>
        </a>
    </div>
</div>