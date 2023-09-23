<?php 
include("connect.php");

error_reporting(0);
session_start();
 
print_r($_SESSION['username']);


if (isset($_POST["go"])) {

    try {
        $orderuser = $_POST["name"];
        $order = $_POST["order"];
        if(isset($_POST["go"])) {
            $orderr = $dns -> query(' SELECT `orders` FROM `orders` WHERE `orders`.`orders` = "'.$order.'" AND `orders`.`ordername` = "'.$orderuser.'"')->fetchAll(PDO::FETCH_ASSOC);

            if (empty($orderr)) {
                $neworder = $dns -> prepare(' INSERT INTO `orders` (`orders`,`ordername`,`date_time`,`day`) VALUES ("'.$order.'" , "'.$orderuser.'", NOW() , DAYNAME(NOW()) ) ');
                $neworder -> execute();
                echo "Your order have been placed!";
            }
            else {
                echo "You already picked this order!";
            }
 
        }
        
    }
    catch (PDOException $e) {
         
        echo "You must have an account so u can order!" . '<a href="signup.php">Register Page</a>'. " " . '<a href="login.php">Or Login</a>' ;
    }
}
 

if (isset($_POST['logout'])) {
    session_destroy();
    header("refresh:1");
}


?>

 
<form action="" method="post">
    <label for="order">Pick Your Order:</label>
    <select name="order" id="order" > 
        <option value="marasi">Marasi</option>
        <option value="sokhna">ElSokhna</option>
    </select>
    <br>
    <label for="name">Your Account Details</label>
    <select name="name" id="name">
        <option value="<?php echo $_SESSION['username'];?>"><?php echo $_SESSION['username'];?></option>
    </select>

    <input type="submit" value="order" name="go">

    <input type="submit" value="logout" name="logout">
</form>
