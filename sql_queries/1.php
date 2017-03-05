<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT * FROM payments ORDER BY amount DESC LIMIT 3';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>

    <p class="lead">
        Получить ТОП 3 платежа относительно суммы оплаты. Упорядочить записи по полю amount от больших значений к
        меньшим.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';