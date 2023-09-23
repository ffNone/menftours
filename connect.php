<?php 
$db = "mysql:host=localhost; dbname=new";
$user = "root";
$pass = "";



try {
    $dns = new PDO ($db, $user, $pass);
}

catch (PDOException $x) {
    echo "ERROR!";
}