<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT DISTINCT p.productName AS product, SUM(od.quantityOrdered) AS count
FROM products p
JOIN orderdetails od ON p.productCode = od.productCode
GROUP BY p.productCode
ORDER BY count DESC
LIMIT 0, 10';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить ТОП 10 продаваемых товаров.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';