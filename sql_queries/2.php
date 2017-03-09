<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT SUM(amount) AS sum, YEAR(paymentDate) AS year FROM payments GROUP BY YEAR(paymentDate)';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить сумму платежей по каждому году.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';