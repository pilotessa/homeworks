<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT c.customerNumber, c.customerName, GROUP_CONCAT(DISTINCT pl.productLine)
FROM customers c
JOIN orders o ON c.customerNumber = o.customerNumber
JOIN orderdetails od ON od.orderNumber = o.orderNumber
JOIN products p ON p.productCode = od.productCode
JOIN productlines pl ON pl.productLine = p.productLine
GROUP BY c.customerNumber';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить продуктовые линейки клиента.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';