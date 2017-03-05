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
</div>