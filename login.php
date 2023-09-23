<?php  
include('connect.php');

session_start();

 



 
    if (isset($_POST["login"])) {

  
        $username = $_POST["username"];
        $password =  password_hash($_POST["password"], PASSWORD_DEFAULT);
    
        $usernamee = $dns -> query('SELECT `password` FROM `clients` WHERE `clients`.`username` = "'.$username.'" AND `clients`.`password` = "'.$password.'" ')->fetchAll(PDO::FETCH_ASSOC);
        if ($usernamee) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password ;
            header("Location:orderpage.php");
            exit();
        }
        else {
            echo "Error";
        }
 
 
    }
             
 
 
   
      
        // if ($_POST["username"] === $_SESSION["username"] and $_POST["password"] === $_SESSION["password"] ) {

        //     header("Location:test.php");
        //     exit();
        // }
        // else {
        //     echo "Wrong Password";
        // }
 
?>



<form action="" method="post">
<input type="text" name="username" id="">
<input type="password" name="password" id="" >
<input type="submit" value="login" name='login'  >
</form>

