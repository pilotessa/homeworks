<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query1 = 'SELECT customerNumber as customer, AVG(amount) AS amount
FROM payments
GROUP BY customerNumber';
$sth1 = $dbh->query($query1);
$data1 = $sth1->fetchAll(PDO::FETCH_ASSOC);

$query2 = 'SELECT e.employeeNumber AS employee, IFNULL(AVG(p.amount), 0) AS amount
FROM customers c
JOIN payments p ON p.customerNumber = c.customerNumber
RIGHT JOIN employees e ON e.employeeNumber = c.salesRepEmployeeNumber
GROUP BY e.employeeNumber';
$sth2 = $dbh->query($query2);
$data2 = $sth2->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>

    <p class="lead">
        Получить средний доход на клиента.
    </p>
    <pre><code class="sql"><?= $query1 ?></code></pre>
    <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseOne" aria-controls="collapseOne">Show
        data</a>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel">
        <br>
        <?php showData($data1); ?>
    </div>

    <br>
    <br>

    <p class="lead">
        Получить средний доход на сотрудника.
    </p>
    <pre><code class="sql"><?= $query2 ?></code></pre>
    <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseTwo" aria-controls="collapseTwo">Show
        data</a>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel">
        <br>
        <?php showData($data2); ?>
    </div>
<?php
include 'include/footer.php';