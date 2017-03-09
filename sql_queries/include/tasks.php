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
</div>