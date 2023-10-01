<title>Edit</title>
<?php
require 'connect.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    if (isset($_GET['id'], $_GET['name'], $_GET['login'], $_GET['password'])
        && '' !== $_GET['id']
        && '' !== $_GET['name']
        && '' !== $_GET['login']
        && '' !== $_GET['password']
    ) {
        $data = [
            'id' => $_GET['id'],
            'name' => $_GET['name'],
            'login' => $_GET['login'],
            'password' => md5($_GET['password']),
        ];
        $query = 'UPDATE users SET name=:name, login=:login, password=:password WHERE id=:id';
        
        $stmt= $pdo->prepare($query);
        if ($stmt->execute($data)) {
            header('location: select.php');
        } else {
            echo 'Error';
        }
    }
    $query = 'SELECT * FROM users where id = :id';

    $stmt= $pdo->prepare($query);
    $stmt->execute(['id' => $_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1>Update User</h1>
<form action="#" method='get'>
<input type="hidden" name='id' value='<?php echo $user['id']; ?>'>
    <label>Name</label>
        <input type="text" name='name' value='<?php echo $user['name']; ?>'><br>
    <label>Login</label>
        <input type="text" name='login' value='<?php echo $user['login']; ?>'><br>
    <label>Password</label>
        <input type="password" name='password'>    
    <button>Update</button>  
</form>
<?php
}
