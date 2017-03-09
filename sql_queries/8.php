<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT e.firstName, e.lastName, COUNT(c.customerNumber) AS customers
FROM employees e
JOIN customers c ON e.employeeNumber = c.salesRepEmployeeNumber
GROUP BY e.employeeNumber
HAVING COUNT(c.customerNumber) > 5';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить сотрудников, привязанных более чем к 5 клинетам.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';