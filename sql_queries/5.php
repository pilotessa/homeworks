<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT c.customerNumber AS customer_id, p.checkNumber AS payment_id, avg(p.amount), e.employeeNumber AS employee_id
FROM customers c
JOIN payments p ON p.customerNumber = c.customerNumber
JOIN employees e ON e.employeeNumber = c.salesRepEmployeeNumber
GROUP BY e.employeeNumber';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>

    <p class="lead">
        Получить средний доход на клиента/сотрудника.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';