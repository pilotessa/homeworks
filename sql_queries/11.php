<?php
require_once 'config/db.php';
require_once 'lib/functions.php';

$sth = $dbh->query('SELECT * FROM offices ORDER BY officeCode');
$offices = $sth->fetchAll(PDO::FETCH_ASSOC);

$officesToExclude = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['offices'])) {
        foreach ((array)$_POST['offices'] as $office) {
            $officesToExclude[] = intval($office);
        }
    }
}

$params = ['offices' => $officesToExclude];
$query = 'SELECT * FROM `offices`
WHERE officeCode NOT IN (:offices)';
$sth = $dbh->query(interpolateQuery($query, $params));
$data = $sth->fetchAll(PDO::FETCH_ASSOC);

include 'include/header.php';
?>
    <p class="lead">
        Выбрать офисы за исключением заданных.
    </p>

    <form method="post">
        <div class="form-group">
            <label for="offices">Исключить офисы</label>
            <?php foreach ($offices as $office): ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="offices[]"
                               value="<?= $office['officeCode'] ?>"<?= in_array($office['officeCode'], $officesToExclude) ? ' checked' : '' ?>>
                        <?= $office['addressLine1'] . ', ' . ($office['addressLine2'] ? $office['addressLine2'] . ', ' : '') . $office['city'] ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary">Выбрать</button>
    </form>

    <br>

    <pre><code class="sql"><?= interpolateQuery($query, $params) ?></code></pre>

    <br>

<?php showData($data); ?>
<?php
include 'include/footer.php';