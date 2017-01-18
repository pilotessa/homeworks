<?php
if (!empty($_GET['task'])) {
    $task = intval($_GET['task']);
    $filename = "{$task}.php";
    echo '<h1>' . $filename . '</h1>';
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        $contentFiltered = str_replace(['<?php', '?>'], '', $content);
        echo '<pre>';
        echo $contentFiltered;
        echo '</pre>';
    }
}