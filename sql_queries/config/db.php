<?php
$dsn = 'mysql:host=localhost; dbname=classicmodels';
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die($e->getMessage());
}