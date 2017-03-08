<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT o.officeCode as office_id, COUNT(DISTINCT e.employeeNumber) as employee_count, COUNT(c.customerNumber) as customer_count FROM offices o 
JOIN employees e ON o.officeCode = e.officeCode
LEFT JOIN customers c ON e.employeeNumber = c.salesRepEmployeeNumber
GROUP BY o.officeCode';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>

    <p class="lead">
        Получить количество сотрудников и количество заказчиков для каждого офиса.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';