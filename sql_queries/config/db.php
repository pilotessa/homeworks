<?php
$dsn = 'mysql:host=localhost;dbname=classicmodels;charset=UTF8';
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die($e->getMessage());
}