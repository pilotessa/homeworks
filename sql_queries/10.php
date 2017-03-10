<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$sth = $dbh->query('SELECT DISTINCT YEAR(orderDate) as year FROM orders ORDER BY year DESC');
$years = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth = $dbh->query('SELECT MAX(YEAR(orderDate)) FROM orders');
$year = intval($sth->fetchColumn(0));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $year = !empty($_POST['year']) ? intval($_POST['year']) : '';
}

$params = ['year' => $year];
$query = 'SELECT of.officeCode AS office, COUNT(o.orderNumber) AS orders
FROM offices of
JOIN employees e ON e.officeCode = of.officeCode
JOIN customers c ON e.employeeNumber = c.salesRepEmployeeNumber
JOIN orders o ON o.customerNumber = c.customerNumber
WHERE YEAR(o.orderDate) = :year
GROUP BY of.officeCode
HAVING orders < 15';
$sth = $dbh->prepare($query);
$sth->execute($params);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить офисы с менее чем 15 заказов за год.
    </p>

    <form class="form-inline" method="post">
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