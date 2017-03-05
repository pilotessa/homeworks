<?php
function interpolateQuery($query, $params)
{
    $keys = array();
    $values = $params;

    # build a regular expression for each parameter
    foreach ($params as $key => $value) {
        if (is_string($key)) {
            $keys[] = '/:' . $key . '/';
        } else {
            $keys[] = '/[?]/';
        }

        if (is_string($value))
            $values[$key] = "'" . $value . "'";

        if (is_array($value))
            $values[$key] = "'" . implode("','", $value) . "'";

        if (is_null($value))
            $values[$key] = 'NULL';
    }

    $query = preg_replace($keys, $values, $query, 1, $count);

    return $query;
}

function showData(array $data)
{
    if (count($data)) {
        ?>
        <table class="table table-striped table-bordered table-hover table-condensed">
            <?php foreach ($data as $rowNumber => $row): ?>
                <?php if (is_array($row)): ?>
                    <?php if (!$rowNumber): ?>
                        <tr>
                            <?php foreach (array_keys($row) as $key): ?>
                                <th><?= $key ?></th>
                            <?php endforeach; ?>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <?php foreach ($row as $value): ?>
                            <td><?= $value ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <?php
    }
}