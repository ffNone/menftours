<?php 

include ("connect.php");
 
error_reporting(0);
try {
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $order = $dns -> prepare (' INSERT INTO `clients` (`username`,`phonenumber`,`address`,`password`) VALUES("'.$username.'","'.$phonenumber.'","'.$address.'","'.$password.'")');
        $order -> execute();
        if ($order) {
            session_start();
            $_SESSION['username'] = "$username";
            $_SESSION['password'] = "$password";
            header('Location:login.php');
            exit();
            die();
        }
        else {
            session_unset();
            session_destroy();
        }
    }
    
}
catch (PDOException $x) {
    echo "SOMETHING WENT WRONG!" . $x -> getMessage();
    header("refresh:1");
}

 ?>
 


<form action="" method="post">
    <input type="text" name="username" id="" required placeholder="الأسم ثلاثي" minlength="6">
    <input type="text" name="phonenumber" id="" required>
    <input type="text" name="address" id="" required>
    <input type="password" name="password" id="" required>
    <input type="submit" value="register" name="register">
</form>