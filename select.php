<title>Select</title>
<h1>List Users</h1>
<?php
require 'connect.php';

$params = [];
$query = "SELECT * FROM users";

if(isset($_GET['name']) && !empty($_GET['name'])){
    $query .= ' WHERE name like :name';
    $params['name'] = '%'.$_GET['name'].'%'; 
}                                            
$result = $pdo->prepare($query);             
$result->execute($params);                   
$users = $result->fetchAll(PDO::FETCH_ASSOC);

?>                                           

<form action="#" method='get'>
    <input type="text" name='name' placeholder='name' value=
   '<?php
         echo $_GET['name'] ?? '';
    ?>'
    >
    <input type='submit' value='search'>
</form>
<a href="insert.php">Add a new element</a>
<?php
if (count($users)) {
    echo 
        '<table border=1> 
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Login</td>
                <td>Password</td>
                <td>Actions</td>
            </tr>';
    foreach ($users as $user) {
        echo 
       '<tr>
            <td>'.$user['id'].'</td>
            <td>'.$user['name'].'</td>
            <td>'.$user['login'].'</td>
            <td>'.$user['password'].'</td>
            <td>
                <a href="edit.php?id='.$user['id'].'">Edit</a>
                <a href="delete.php?id='.$user['id'].'">Delete</a>
            </td>
        </tr>';
    }
    echo
       '</table>';
    }
