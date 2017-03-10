<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT orderNumber, COUNT(orderNumber) AS quantity
FROM orderdetails
GROUP BY orderNumber
ORDER BY quantity DESC
LIMIT 1';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить заказ с наибольшим количеством товаров.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';