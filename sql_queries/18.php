<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$query = 'SELECT * FROM customer_product_lines';
$sth = $dbh->query($query);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Работа с представлениями.
    </p>

    <pre><code class="sql"><?= $query ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';