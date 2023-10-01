<title>Insert</title>
<h1>Add a new User</h1>
<form action="#" method='get'>
        <label>Name</label>
        <input type="text" name='name'><br>
        <label>Login</label>
        <input type="text" name='login'><br>
        <label>Password</label>
        <input type="password" name='password'><br>    
        <input type="submit" value='Add'>
</form>

<?php
require 'connect.php';

if (isset($_GET['name'], $_GET['login'], $_GET['password'])
    && !empty($_GET['name'])
    && !empty($_GET['login'])
    && !empty($_GET['password'])
   ) 
    {
        $data = [
            'name' => $_GET['name'],
            'login' => $_GET['login'],
            'password' => md5($_GET['password']),
        ];
        $query = 'INSERT INTO users (name, login, password) 
                    VALUES (:name, :login, :password)';
        
        $stmt= $pdo->prepare($query);
        if ($stmt->execute($data)) {
            header('location: select.php');
        } else {
            echo 'Error';
        }
    }
