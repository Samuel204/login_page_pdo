<?php
$host = 'localhost';
$db = 'database_1';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dns = "mysql:host=$host; dbname=$db; charset=$charset";

$options = [PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,];

$conn = new PDO($dns, $user, $pass, $options);
?>