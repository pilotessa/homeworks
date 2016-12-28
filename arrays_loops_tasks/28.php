<?php
/*
 * Вывести таблицу умножения с помощью двух циклов for.
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>28</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</head>
<body>
<div class="container">
    <h1>Таблица умножения</h1>
    <table class="table table-bordered">
        <tr>
            <th class="text-right">&nbsp;</th>
            <th class="text-right">2</th>
            <th class="text-right">3</th>
            <th class="text-right">4</th>
            <th class="text-right">5</th>
            <th class="text-right">6</th>
            <th class="text-right">7</th>
            <th class="text-right">8</th>
            <th class="text-right">9</th>
        </tr>
        <?php for ($i = 2; $i <=9; $i++ ) : ?>
        <tr>
            <?="<th class=\"text-right\">{$i}</th>"?>
            <?php for ($j = 2; $j <=9; $j++ ) : ?>
                <?='<td class="text-right">' . $i * $j . '</td>'?>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>
</div>
</body>
</html>
