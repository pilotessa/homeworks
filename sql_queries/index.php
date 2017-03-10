<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SQL запросы</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="../index.html">Homeworks</a></li>
        <li class="active">SQL запросы</li>
    </ol>
    <header class="page-header">
        <h1>SQL запросы</h1>
    </header>
    <dl class="lead">
        <dt>О базе данных</dt>
        <dd>
            Торговля с продуктами. Таблица продуктов связана с таблицей типов продукции связью один ко многим. Заказы
            продукции ссылаются на конкретный продукт и на конкретного покупателя. Таблица заказа связана с таблицей
            покупателя связью многие к одному. Таблица заказов связана с таблицей продуктов связью многие ко многим
            посредством таблицы деталей заказа. Покупатель связан с конкретным сотрудником. Сотрудники фирмы прикреплены
            к разным офисам в разных локациях. Таблица с оплатой продукции связана с таблицей покупателя связью многие к
            одному.
        </dd>
    </dl>
    <?php include 'include/tasks.php'; ?>
    <footer>
        <hr>
        <p>&copy; 2014-2016 <a href="http://php-academy.kiev.ua/" target="_blank">PHP Academy</a></p>
    </footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>