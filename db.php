<?php

$dsn = 'mysql:host=localhost;dbname=web_socket';
$user = "root";
$password = "";
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
    $conn = new PDO($dsn, $user, $password, $option);

} catch (PDOException $e) {
    echo "Falied: " . $e->getMessage();
}