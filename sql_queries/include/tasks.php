<?php
$currentTask = basename($_SERVER['PHP_SELF']);
?>
<div class="list-group">
    <a href="1.php" class="list-group-item<?= $currentTask == '1.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>1.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить ТОП 3 платежа относительно суммы оплаты. Упорядочить записи по полю amount от больших значений к
            меньшим.
        </p>
    </a>
    <a href="2.php" class="list-group-item<?= $currentTask == '2.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>2.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить сумму платежей по каждому году.
        </p>
    </a>
    <a href="3.php" class="list-group-item<?= $currentTask == '3.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>3.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить платежи покупателя по месяцам и годам.
        </p>
    </a>
    <a href="4.php" class="list-group-item<?= $currentTask == '4.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>4.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить количество сотрудников и количество заказчиков для каждого офиса.
        </p>
    </a>
    <a href="5.php" class="list-group-item<?= $currentTask == '5.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>5.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить средний доход на клиента/сотрудника.
        </p>
    </a>
    <a href="6.php" class="list-group-item<?= $currentTask == '6.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>6.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить сотрудников без клиентов.
        </p>
    </a>
    <a href="7.php" class="list-group-item<?= $currentTask == '7.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>7.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить ТОП 10 продаваемых товаров.
        </p>
    </a>
    <a href="8.php" class="list-group-item<?= $currentTask == '8.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>8.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить сотрудников, привязанных более чем к 5 клинетам.
        </p>
    </a>
    <a href="9.php" class="list-group-item<?= $currentTask == '9.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>9.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить заказ с наибольшим количеством товаров.
        </p>
    </a>
    <a href="10.php" class="list-group-item<?= $currentTask == '10.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>10.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить офисы с менее чем 15 заказов за год.
        </p>
    </a>
    <a href="11.php" class="list-group-item<?= $currentTask == '11.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>11.php</small>
        </h3>
        <p class="list-group-item-text">
            Выбрать офисы за исключением заданных.
        </p>
    </a>
    <a href="12.php" class="list-group-item<?= $currentTask == '12.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>12.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить день месяца, месяц, год, сумму платежей.
        </p>
    </a>
    <a href="13.php" class="list-group-item<?= $currentTask == '13.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>13.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить максимальную сумму платежей по году и месяцу.
        </p>
    </a>
    <a href="14.php" class="list-group-item<?= $currentTask == '14.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>14.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить клиентов, которые не сделали заказ.
        </p>
    </a>
    <a href="15.php" class="list-group-item<?= $currentTask == '15.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>15.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить клиентов, у которых период между двумя заказами более трех месяцев.
        </p>
    </a>
    <a href="16.php" class="list-group-item<?= $currentTask == '16.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>16.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить заказы без оплат.
        </p>
    </a>
    <a href="17.php" class="list-group-item<?= $currentTask == '17.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>17.php</small>
        </h3>
        <p class="list-group-item-text">
            Получить продуктовые линейки клиента.
        </p>
    </a>
    <a href="18.php" class="list-group-item<?= $currentTask == '18.php' ? ' active' : '' ?>">
        <h3 class="list-group-item-heading">
            <small>18.php</small>
        </h3>
        <p class="list-group-item-text">
            Работа с представлениями.
        </p>
    </a>
</div>