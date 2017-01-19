<?php
if (!empty($_GET['task'])) {
    $task = intval($_GET['task']);
    $filename = "{$task}.php";
    if (file_exists($filename)) {
        echo '<h1>' . $filename . '</h1>';
        $content = file_get_contents($filename);
        $contentFiltered = htmlentities($content);
        echo '<pre>';
        echo $contentFiltered;
        echo '</pre>';
        echo '<hr>';
        include $filename;
    }
}