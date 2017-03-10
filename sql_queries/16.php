<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT c.customerNumber, c.customerName, c.contactFirstName, c.contactLastName FROM customers c 
JOIN orders o USING (customerNumber)
LEFT JOIN payments p USING (customerNumber)
WHERE p.checkNumber IS NULL 
GROUP BY c.customerNumber';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить заказы без оплат.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';