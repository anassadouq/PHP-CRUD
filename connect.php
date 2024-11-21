<?php
try {
    $user = 'root';
    $password = '';
    $host = 'localhost';
    $db_name = 'php_crud';
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
}
catch (PDOException $e) {
    echo "<p>Erreur: ".$e->getMessage();
    die();
}