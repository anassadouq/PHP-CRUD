<title>Delete</title>
<?php

require 'connect.php';

if (isset($_GET['id']) && '' !== $_GET['id']) {
    $data = [
        'id' => $_GET['id']
    ];

    $query = 'DELETE FROM users where id=:id';
    
    $stmt= $pdo->prepare($query);
    if($stmt->execute($data)) {
        header('location: select.php');
    } else {
        echo 'Error';
    }
}