<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT CONCAT(e.lastName, " ", e.firstName) as employee
FROM employees e
LEFT JOIN customers c ON e.employeeNumber = c.salesRepEmployeeNumber
WHERE c.customerNumber IS NULL';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>

    <p class="lead">
        Получить сотрудников без клиентов.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';