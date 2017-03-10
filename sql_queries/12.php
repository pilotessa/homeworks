<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT 
DAY(paymentDate) AS day, 
MONTH(paymentDate) AS month, 
YEAR(paymentDate) AS year, 
SUM(amount)
FROM `payments`
GROUP BY paymentDate
ORDER BY year, month, day';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить день месяца, месяц, год, сумму платежей.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';