<?php
$currentTask = !empty($_GET['task']) ? intval($_GET['task']) : 0;
$filename = "{$currentTask}.php";
if (file_exists($filename)) {
    $content = file_get_contents($filename);
    $contentFiltered = htmlentities($content);
} else {
    die();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Задачи по массивам и циклам</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css">
    <link href="../css/code.css" rel="stylesheet">

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
        <li><a href="index.php">Задачи по массивам и циклам</a></li>
        <li class="active"><?= $filename ?></li>
    </ol>
    <header class="page-header">
        <h1><?= $filename ?></h1>
    </header>
    <div class="row">
        <section class="col-md-8">
            <pre><code class="html"><?= $contentFiltered ?></code></pre>
            <?php include $filename; ?>
        </section>
        <aside class="col-md-4">
            <?php include 'include/tasks.php'; ?>
        </aside>
    </div>
    <footer>
        <hr>
        <p>&copy; 2016-2017 <a href="http://helene.com.ua" target="_blank">Елена Мухина</a></p>
    </footer>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
<script src="../js/code.js"></script>
<script src="../js/collapse.js"></script>
</body>
</html>