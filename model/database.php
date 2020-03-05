<?php
    $dsn = "mysql:host=z12itfj4c1vgopf8.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=wjbw108az3b5v8zw";
    $username = "puhz7p8dtkj0uc2h";
    $password = "oo2fchf3mknqppza";
    

try{
    $db = new PDO($dsn, $username);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include ('erros/database_error.php');
    exit();
}
?>
