<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT MONTH(paymentDate) AS month , YEAR(paymentDate) AS year, MAX(amount)
FROM `payments`
GROUP BY year, month';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить максимальную сумму платежей по году и месяцу.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';