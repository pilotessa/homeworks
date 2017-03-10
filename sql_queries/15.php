<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT o1.customerNumber, o1.orderNumber AS order1Number, o1.orderDate AS order1Date, o2.orderNumber AS order2Number, o2.orderDate AS order2Date
FROM orders o1, orders o2 
WHERE o1.customerNumber = o2.customerNumber AND o1.orderDate > o2.orderDate 
AND (SELECT COUNT(orderNumber) FROM orders o3 WHERE o3.orderDate < o1.orderDate and o3.orderDate > o2.orderDate and o1.customerNumber = o3.customerNumber) = 0 
AND PERIOD_DIFF(DATE_FORMAT(o1.orderDate, "%y%m"), DATE_FORMAT(o2.orderDate, "%y%m")) > 3 
GROUP BY o1.customerNumber 
ORDER BY o1.customerNumber ASC';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить клиентов, у которых период между двумя заказами более трех месяцев.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';