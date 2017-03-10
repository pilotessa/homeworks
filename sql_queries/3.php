<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$sth = $dbh->query('SELECT * FROM customers ORDER BY customerNumber');
$customers = $sth->fetchAll(PDO::FETCH_ASSOC);

$sth = $dbh->query('SELECT MIN(customerNumber) FROM customers');
$customerNumber = intval($sth->fetchColumn(0));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerNumber = !empty($_POST['customerNumber']) ? intval($_POST['customerNumber']) : '';
}

$params = ['customerNumber' => $customerNumber];
$query = 'SELECT c.contactLastName, c.contactFirstName, SUM(p.amount) AS payment, YEAR(p.paymentDate) AS year, MONTH(p.paymentDate) AS month 
FROM customers c JOIN payments p USING (customerNumber)
WHERE c.customerNumber = :customerNumber
GROUP BY YEAR(p.paymentDate), MONTH(p.paymentDate)';
$sth = $dbh->prepare($query);
$sth->execute($params);
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Получить платежи покупателя по месяцам и годам.
    </p>

    <form class="form-inline" method="post">
        <div class="form-group">
            <label for="customerNumber">Покупатель</label>
            <select name="customerNumber" id="customerNumber" class="form-control">
                <?php foreach ($customers as $customer): ?>
                    <option value="<?= $customer['customerNumber'] ?>"<?= $customer['customerNumber'] == $customerNumber ? ' selected' : '' ?>>
                        <?= $customer['contactFirstName'] . ' ' . $customer['contactLastName'] ?>
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