<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$month = 1;

$sth = $dbh->query('SELECT DISTINCT YEAR(orderDate) as year FROM orders ORDER BY year DESC');
$years = $sth->fetchAll(PDO::FETCH_ASSOC);
$sth = $dbh->query('SELECT MAX(YEAR(orderDate)) FROM orders');
$year = intval($sth->fetchColumn(0));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $month = !empty($_POST['month']) ? intval($_POST['month']) : '';
    $year = !empty($_POST['year']) ? intval($_POST['year']) : '';
}

$params = [
    'month' => $month,
    'year' => $year,
];
$query = 'SELECT c.customerNumber, c.customerName, o.orderNumber FROM customers c
LEFT JOIN orders o
ON (o.customerNumber = c.customerNumber AND MONTH(o.orderDate) = :month AND YEAR(o.orderDate) = :year)
WHERE o.orderNumber IS NULL';
$sth = $dbh->prepare($query);
$sth->execute($params);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить клиентов, которые не сделали заказ.
    </p>

    <form class="form-inline" method="post">
        <div class="form-group">
            <label for="month">Месяц</label>
            <select name="month" id="month" class="form-control">
                <?php for ($m = 1; $m <= 12; $m++): ?>
                    <option value="<?= $m ?>"<?= $m == $month ? ' selected' : '' ?>>
                        <?= $m ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="year">Год</label>
            <select name="year" id="year" class="form-control">
                <?php foreach ($years as $y): ?>
                    <option value="<?= $y['year'] ?>"<?= $y['year'] == $year ? ' selected' : '' ?>>
                        <?= $y['year'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Выбрать</button>
    </form>

    <br>

    <pre><code class="sql"><?= interpolateQuery($query, $params) ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';